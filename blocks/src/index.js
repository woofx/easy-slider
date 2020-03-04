import { registerBlockType,  RangeControl, ToggleControl } from '@wordpress/blocks';
import { InnerBlocks,InspectorControls } from '@wordpress/block-editor';
//import { RangeControl, ToggleControl } from '@wordpress/components';
const ALLOWED_BLOCKS = [ 'core/group', 'core/cover' ];
//const { InspectorControls } = wp.editor;
//const { PanelBody } = wp.components;
import { TextControl,PanelBody, PanelRow, FormToggle, Tooltip, Dashicon, Button } from '@wordpress/components';

registerBlockType( 'easy-slider/slider-block', {
    title: 'Slider',
    icon: 'slides',
    category: 'layout',
    attributes: {
        slideCount: { 
            type: 'string',
            default: 1,
            attribute: 'data-slidecount'
        },
        centered: { 
            type: 'boolean',
            default: false,
            attribute: 'data-centered'
        },
        showArrows: { 
            type: 'boolean',
            default: false,
            attribute: 'data-showarrows',
        },
        showDots: {
            type: 'boolean',
            default: false,
            attribute: 'data-showdots'
        },
        rtl: { 
            type: 'boolean',
            default: false,
            attribute: 'data-rtl'
        },
        autoplay: { 
            type: 'boolean',
            default: true,
            attribute: 'data-autoplay'
        },
        loop: { 
            type: 'boolean',
            default: true,
            attribute: 'data-loop'
        },
        
    },
    edit: ( props ) => { 
        
        const { attributes, setAttributes, className } = props;
        
        return (
            [ 
                <InspectorControls>
                    <PanelBody title={ 'Slider Settings' } >
                    {/* Slides to show */}
                    <PanelRow>
                        <Tooltip text="Number of visible slides in the slider.">
                            <label htmlFor="slides-to-show-text-control" >
                                { 'Slides to show' }
                                <Dashicon icon="editor-help"></Dashicon>
                            </label>
                        </Tooltip>
                        <TextControl
                            id="slides-to-show-text-control"
                            type={ 'number' }
                            value={ attributes.slideCount }
                            onChange={ (value) => setAttributes( { slideCount: value } ) }
                            min={1}
                            max={20}
                        />
                    </PanelRow>
                    {/* Centered */}
                    <PanelRow>
                        <label htmlFor="centered-form-toggle" >
                            { 'Keep slides centered' }
                        </label>
                        <FormToggle
                            id="centered-form-toggle"
                            label={ 'Centered' }
                            checked={ attributes.centered }
                            onChange={ () => setAttributes( { centered: ! attributes.centered } ) }
                        />
                    </PanelRow>
                    {/* Show Arrows */}
                    <PanelRow>
                        <label htmlFor="show-arrows-form-toggle" >
                            { 'Show Arrows' }
                        </label>
                        <FormToggle
                            id="show-arrows-form-toggle"
                            label={ 'Show Arrows' }
                            checked={ attributes.showArrows }
                            onChange={ () => setAttributes( { showArrow: ! attributes.showArrows } ) }
                        />
                    </PanelRow>
                    {/* Show Dots */}
                    <PanelRow>
                        <label htmlFor="show-dots-form-toggle" >
                            { 'Show Dots' }
                        </label>
                        <FormToggle
                            id="show-dots-form-toggle"
                            label={ 'Show Dots' }
                            checked={ attributes.showDots }
                            onChange={ () => setAttributes( { showDots: ! attributes.showDots } ) }
                        />
                    </PanelRow>
                    {/* RTL */}
                    <PanelRow>
                        <label htmlFor="rtl-form-toggle" >
                            { 'Right to Left (RTL)' }
                        </label>
                        <FormToggle
                            id="rtl-form-toggle"
                            label={ 'Right to Left (RTL)' }
                            checked={ attributes.rtl }
                            onChange={ () => setAttributes( { rtl: ! attributes.rtl } ) }
                        />
                    </PanelRow>
                    {/* Autoplay */}
                    <PanelRow>
                        <label htmlFor="autoplay-form-toggle" >
                            { 'Autoplay' }
                        </label>
                        <FormToggle
                            id="autoplay-form-toggle"
                            label={ 'Autoplay' }
                            checked={ attributes.autoplay }
                            onChange={ () => setAttributes( { autoplay: ! attributes.autoplay } ) }
                        />
                    </PanelRow>
                    {/* Loop */}
                    <PanelRow>
                        <label htmlFor="loop-form-toggle" >
                            { 'Loop Slides' }
                        </label>
                        <FormToggle
                            id="loop-form-toggle"
                            label={ 'Loop Slides' }
                            checked={ attributes.loop }
                            onChange={ () => setAttributes( { autoplay: ! attributes.loop } ) }
                        />
                    </PanelRow>
                    
                    
                </PanelBody>
            </InspectorControls>
            ,
            <div className={ className }>
                <InnerBlocks 
                    allowedBlocks={ ['easy-slider/slide-item-block'] }
                />
            </div>
            ]
        );
    },
    save: ( { attributes, className } ) => {
        return (
            <div className={ className } 
             data-slidecount={attributes.slideCount}
             data-centered={attributes.centered}
             data-showDots={attributes.showDots}
             data-showArrows={attributes.showArrow}
             data-rtl={attributes.rtl}
             data-autoplay={attributes.autoplay}
             data-loop={attributes.loop} >
                <InnerBlocks.Content />
            </div>
        );
    },
} );

registerBlockType( 'easy-slider/slide-item-block', {
    title: 'Slide Item',
    icon: 'analytics',
    parent: ['easy-slider/slider-block'],
    category:'layout',
    edit: ( { className } ) => { 
        return (
            <div className={ className }>
                <InnerBlocks 
                    allowedBlocks={ ALLOWED_BLOCKS }
                />
            </div>
        );
    },
    save: ( { className } ) => {
        return (
            <div className={ className }>
                <InnerBlocks.Content />
            </div>
        );
    },
} );