import './admin.scss';

import api from '@wordpress/api';

import {
    Button,
    Panel,
    PanelBody,
    Placeholder,
    SelectControl,
    Spinner,
    TextControl,
    ToggleControl,
	CheckboxControl,
} from '@wordpress/components';

import {Fragment, render, Component} from '@wordpress/element';

import {__} from '@wordpress/i18n';
import Notices from './Notice';

import {dispatch} from '@wordpress/data';

const posts_array = buddy_vars.postTypes;

class App extends Component {
    constructor() {
        super(...arguments);

        this.state = {
            webhook: '',
            manualDeploy: true,
            topbar: true,
			manualDeployCapabilities: '',
            automaticDeploy: false,
			automaticDeployCapabilities: '',
			automaticDeployPostTypes: [''],
            isAPILoaded: false
        };
    }

    componentDidMount() {

        api.loadPromise.then(() => {
            this.settings = new api.models.Settings();

            const {isAPILoaded} = this.state;

            if (isAPILoaded === false) {
                this.settings.fetch().then((response) => {
                    this.setState({
                        webhook: response['buddy_webhook'],
                        manualDeploy: Boolean(response['buddy_manual_deploy']),
                        topbar: Boolean(response['buddy_topbar']),
						manualDeployCapabilities: response['buddy_manual_deploy_capabilities'],
                        automaticDeploy: Boolean(response['buddy_automatic_deploy']),
						automaticDeployCapabilities: response['buddy_automatic_deploy_capabilities'],
						automaticDeployPostTypes: response['buddy_automatic_deploy_post_types'],
                        isAPILoaded: true
                    });
                });
            }
        });
    }

    render() {
        const {
            webhook,
            manualDeploy,
            topbar,
			manualDeployCapabilities,
            automaticDeploy,
			automaticDeployCapabilities,
			automaticDeployPostTypes,
            isAPILoaded
        } = this.state;

        if (!isAPILoaded) {
            return (
                <Placeholder>
                    <Spinner/>
                </Placeholder>
            );
        }

        return (
            <Fragment>
                <div className="buddy-plugin__main">
                    <Panel>
						{ !buddy_vars.definedWebhook
                        ? <PanelBody title={
                                __('Required configuration', buddy_vars.languageSlug)
                            }
                            icon="admin-tools">
                            <TextControl help={
                                    __('Enter your Buddy Webhook', buddy_vars.languageSlug)
                                }
                                label={
                                    __('Webhook', buddy_vars.languageSlug)
                                }
                                onChange={
                                    (webhook) => this.setState({webhook})
                                }
                                value={webhook}/>
                        </PanelBody>
						: <PanelBody title={
							__('Required configuration', buddy_vars.languageSlug)
						}
							icon="admin-tools">
							<p>Webhook is already defined in <code>wp-config.php</code> file.</p>
						</PanelBody>
						}

                        <PanelBody title={
                                __('Manual Deployments', buddy_vars.languageSlug)
                            }
                            icon="upload">
                            <ToggleControl checked={manualDeploy}
                                help={
                                    __('Check to enable or disable manual deployments.', buddy_vars.languageSlug)
                                }
                                label={
                                    __('Enable Manual Deployments', buddy_vars.languageSlug)
                                }
                                onChange={
                                    (manualDeploy) => this.setState({manualDeploy})
                                }/>

                            <ToggleControl checked={topbar}
                                label={
                                    __('Add deploy button to admin bar', buddy_vars.languageSlug)
                                }
                                help={
                                    __('Adds deployment button to admin bar.', buddy_vars.languageSlug)
                                }
                                onChange={
                                    (topbar) => this.setState({topbar})
                                }/>

							<SelectControl
                                help={ __( 'Pick which capability is needed to run manual deployments.', buddy_vars.languageSlug ) }
                                label={ __( 'Manual deployments capability', buddy_vars.languageSlug ) }
                                onChange={ ( manualDeployCapabilities ) => this.setState( { manualDeployCapabilities } ) }
                                options={ buddy_vars.roles }
                                value={ manualDeployCapabilities }
                            />
                        </PanelBody>

                        <PanelBody title={
                                __('Automatic Deployments', buddy_vars.languageSlug)
                            }
                            icon="controls-repeat">
                            <ToggleControl checked={automaticDeploy}
                                label={
                                    __('Enable Automatic Deployments', buddy_vars.languageSlug)
                                }
                                help={
                                    __('Check to enable or disable automatic deployments.', buddy_vars.languageSlug)
                                }
                                onChange={
                                    (automaticDeploy) => this.setState({automaticDeploy})
                            }/>

							<ul>
							{
								posts_array.map(( item ) => (
									<li><CheckboxControl
										className="check_items"
										label={ item.label }
										checked={ automaticDeployPostTypes.indexOf( item.label ) > -1 }
										onChange={ ( check ) => {
											const index = automaticDeployPostTypes.indexOf( item.label );
											check ? automaticDeployPostTypes.push( item.label ) : ( index !== -1 ? automaticDeployPostTypes.splice( index, 1 ) : automaticDeployPostTypes );
											this.setState({ automaticDeployPostTypes } )
										} }
									/></li>
								) )
							}
							</ul>

							<SelectControl
								help={ __( 'Pick which capability is required to run automatic deployments.', buddy_vars.languageSlug ) }
								label={ __( 'Automatic deployment capability', buddy_vars.languageSlug ) }
								onChange={ ( automaticDeployCapabilities ) => this.setState( { automaticDeployCapabilities } ) }
								options={ buddy_vars.roles }
								value={ automaticDeployCapabilities }
							/>
                        </PanelBody>
                        <Button isPrimary isLarge
                            onClick={
                                () => {
                                    const {
										webhook,
										manualDeploy,
										topbar,
										manualDeployCapabilities,
										automaticDeploy,
										automaticDeployCapabilities,
									} = this.state;

                                    const settings = new api.models.Settings({
										['buddy_webhook']: webhook,
										['buddy_manual_deploy']: manualDeploy,
										['buddy_topbar']: topbar,
										['buddy_manual_deploy_capabilities']: manualDeployCapabilities,
										['buddy_automatic_deploy']: automaticDeploy,
										['buddy_automatic_deploy_capabilities']: automaticDeployCapabilities,
										['buddy_automatic_deploy_post_types']: automaticDeployPostTypes,
									});

									settings.save();

                                    dispatch('core/notices').createNotice('success', __('Settings Saved', buddy_vars.languageSlug), {
                                        type: 'snackbar',
                                        isDismissible: true
                                    });
                                }
                        }>
                            {
                            __('Save', buddy_vars.languageSlug)
                        } </Button>
                    </Panel>
                </div>
                <div className="buddy-plugin__notices">
                    <Notices/>
                </div>
            </Fragment>
        )
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const htmlOutput = document.getElementById('buddy-options-wrapper');

    if (htmlOutput) {
        render (
            <App/>,
            htmlOutput
        );
    }
});
