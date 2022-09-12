/* version orig:  Mar 12 2019 */

( function ( editor, blocks, i18n, element, components, compose ) {
	
	var el = element.createElement;
	var registerBlockType = blocks.registerBlockType;
	var BlockControls = editor.BlockControls;
	var SelectControl = components.SelectControl;
	var withState = compose.withState;
	var Toolbar = components.Toolbar;
	var IconButton = components.IconButton;
	var Placeholder = components.Placeholder;
	var Spinner  = components.Spinner;
	var __ = i18n.__;
	
	registerBlockType( 'orion/widget-block', {
		title: __( 'ORION Widget', 'dentalia' ),
		
		description: __( 'Select a widget from the dropdown.', 'dentalia' ),
		
		icon: function() {
			return el(
				'span',
				{
					className: 'ab-icon orion-icon'
				}
			)
		},
		
		category: 'widgets',

		keywords: [sowbBlockEditorAdmin.widgets.reduce( function ( keywords, widgetObj ) {		
		if ( keywords.length > 0 ) {		
			keywords += ',';		
		}		
		return keywords + widgetObj.name;		
	}, '' )],		

		supports: {
			html: false,
		},
		
		attributes: {
			widgetClass: {
				type: 'string',
			},
			widgetData: {
				type: 'object',
			}
		},
		
		edit: withState( {
			editing: false,
			formInitialized: false,
			previewInitialized: false,
			widgetFormHtml: '',
			widgetSettingsChanged: false,
			widgetPreviewHtml: '',
		} )( function ( props ) {
			
			function onWidgetClassChange( newWidgetClass ) {
				if ( newWidgetClass !== '' ) {
					if ( props.widgetSettingsChanged && ! confirm( sowbBlockEditorAdmin.confirmChangeWidget ) ) {
						return false;
					}
					props.setAttributes( { widgetClass: newWidgetClass, widgetData: null } );
					props.setState( {
						editing: true,
						widgetFormHtml: null,
						formInitialized: false,
						widgetSettingsChanged: false,
						widgetPreviewHtml: null,
						previewInitialized: false
					} );
				}
			}
			
			function switchToEditing() {
				props.setState( { editing: true, formInitialized: false } );
			}
			
			function switchToPreview() {
				props.setState( { editing: false, previewInitialized: false } );
			}
			
			function setupWidgetForm( formContainer ) {
				var $mainForm = $( formContainer ).find( '.siteorigin-widget-form-main' );
				if ( $mainForm.length > 0 && ! props.formInitialized ) {
					var $previewContainer = $mainForm.siblings('.siteorigin-widget-preview');
					$previewContainer.find( '> a' ).on( 'click', function ( event ) {
						event.stopImmediatePropagation();
						switchToPreview();
					} );
					$mainForm.data( 'backupDisabled', true );
					$mainForm.sowSetupForm();
					if ( ! props.attributes.widgetData ) {
						props.setAttributes( { widgetData: sowbForms.getWidgetFormValues( $mainForm ) } );
					}
					$mainForm.on( 'change', function () {
						props.setAttributes( { widgetData: sowbForms.getWidgetFormValues( $mainForm ) } );
						props.setState( {
							widgetSettingsChanged: true,
							widgetPreviewHtml: null,
							previewInitialized: false
						} );
					} );
					props.setState( { formInitialized: true } );
				}
			}
			
			function setupWidgetPreview() {
				if ( ! props.previewInitialized ) {
					$( window.sowb ).trigger( 'setup_widgets', { preview: true } );
					props.setState( { previewInitialized: true } );
				}
			}
			
			if ( props.editing || ! props.attributes.widgetClass || ! props.attributes.widgetData ) {
				var widgetsOptions = [];
				if ( sowbBlockEditorAdmin.widgets ) {
					sowbBlockEditorAdmin.widgets.sort( function ( a, b ) {
						if ( a.name < b.name ) {
							return -1;
						} else if ( a.name > b.name ) {
							return 1;
						}
						return 0;
					} );
					widgetsOptions2 = sowbBlockEditorAdmin.widgets.map( function ( widget ) {
						return { value: widget.class, label: widget.name };
					} );
					widgetsOptions = widgetsOptions2.filter( function ( widget ) {
						if (widget.value.startsWith('orion')) {
							return { value: widget.value, label: widget.label };	
						}
						if (widget.value == 'SiteOrigin_Widget_Editor_Widget') {
							return { value: widget.value, label: widget.label };	
						}						

					} );
					widgetsOptions.unshift( { value: '', label: __( 'Select widget type', 'dentalia' ) } );
				}
				
				var loadWidgetForm = props.attributes.widgetClass && ! props.widgetFormHtml;
				if ( loadWidgetForm ) {
					$.post( {
						url: sowbBlockEditorAdmin.restUrl + 'sowb/v1/widgets/forms',
						beforeSend: function ( xhr ) {
							xhr.setRequestHeader( 'X-WP-Nonce', sowbBlockEditorAdmin.nonce );
						},
						data: {
							widgetClass: props.attributes.widgetClass,
							widgetData: props.attributes.widgetData,
						}
					} )
					.done( function( widgetForm ) {
						props.setState( { widgetFormHtml: widgetForm } );
					} )
					.fail( function ( response ) {
						var errorMessage = '';		
						if ( response.hasOwnProperty( 'responseJSON' ) ) {		
							errorMessage = response.responseJSON.message;		
						} else if ( response.hasOwnProperty( 'responseText' ) ) {		
							errorMessage = response.responseText;		
						}		
								
						props.setState( { widgetFormHtml: '<div>' + errorMessage + '</div>', });
					});
				}
				
				var widgetForm = props.widgetFormHtml ? props.widgetFormHtml : '';
				
				return [
					!! widgetForm && el(
						BlockControls,
						{ key: 'controls' },
						el(
							Toolbar,
							null,
							el(
								IconButton,
								{
									className: 'components-icon-button components-toolbar__control',
									label: __( 'Preview widget.', 'dentalia' ),
									onClick: switchToPreview,
									icon: 'visibility'
								}
							)
						)
					),
					el(
						Placeholder,
						{
							key: 'placeholder',
							className: 'orion-widget-placeholder',
							label: __( 'Orion Widget', 'dentalia' ),
							instructions: __( 'Select Widget:', 'dentalia' )
						},
						( props.loadingWidgets || loadWidgetForm ?
							el( Spinner ) :
							el(
								'div',
								{ className: 'so-widget-block-container' },
								el(
									SelectControl,
									{
										options: widgetsOptions,
										value: props.attributes.widgetClass,
										onChange: onWidgetClassChange,
									}
								),
								el( 'div', {
									className: 'so-widget-block-form-container',
									dangerouslySetInnerHTML: { __html: widgetForm },
									ref: setupWidgetForm,
								} )
							)
						)
					)
				];
			} else {
				
				var loadWidgetPreview = ! props.loadingWidgets &&
					! props.editing &&		
					! props.widgetPreviewHtml &&		
					props.attributes.widgetClass &&		
					props.attributes.widgetData;


				if ( loadWidgetPreview ) {
					$.post( {
						url: sowbBlockEditorAdmin.restUrl + 'sowb/v1/widgets/previews',
						beforeSend: function ( xhr ) {
							xhr.setRequestHeader( 'X-WP-Nonce', sowbBlockEditorAdmin.nonce );
						},
						data: {
							widgetClass: props.attributes.widgetClass,
							widgetData: props.attributes.widgetData || {}
						}
					} )
					.done( function( widgetPreview ) {
						props.setState( {
							widgetPreviewHtml: widgetPreview,
							previewInitialized: false,
						} );
					} )
					.fail( function ( response ) {
						var errorMessage = '';		
						if ( response.hasOwnProperty( 'responseJSON' ) ) {		
							errorMessage = response.responseJSON.message;		
						} else if ( response.hasOwnProperty( 'responseText' ) ) {		
							errorMessage = response.responseText;		
						}		
								
						props.setState( {		
							widgetPreviewHtml: '<div>' + errorMessage + '</div>',		
						} );		
					});
				}
				var widgetPreview = props.widgetPreviewHtml ? props.widgetPreviewHtml : '';
				return [
					el(
						BlockControls,
						{ key: 'controls' },
						el(
							Toolbar,
							null,
							el(
								IconButton,
								{
									className: 'components-icon-button components-toolbar__control',
									label: __( 'Edit widget.', 'dentalia' ),
									onClick: switchToEditing,
									icon: 'edit'
								}
							)
						)
					),
					el(
						'div',
						{
							key: 'preview',
							className: 'so-widget-preview-container'
						},
						( loadWidgetPreview ?
							el( 'div', {
									className: 'so-widgets-spinner-container'
								},
								el(
									'span',
									null,
									el( Spinner )
								)
							) :
							el( 'div', {
								dangerouslySetInnerHTML: { __html: widgetPreview },
								ref: setupWidgetPreview,
							} )
						)
					)
				];
			}
		} ),
		
		save: function () {
			// Render in PHP
			return null;
		}
	} );
} )( window.wp.editor, window.wp.blocks, window.wp.i18n, window.wp.element, window.wp.components, window.wp.compose );
