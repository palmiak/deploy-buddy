import {
    Button
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import { SnackbarList } from '@wordpress/components';

import {
    dispatch,
    useDispatch,
    useSelect,
} from '@wordpress/data';

import { store as noticesStore } from '@wordpress/notices';

const Notices = () => {
	const notices = useSelect(
		( select ) =>
			select( noticesStore )
				.getNotices()
				.filter( ( notice ) => notice.type === 'snackbar' ),
		[]
	);
	const { removeNotice } = useDispatch( noticesStore );
	return (
		<SnackbarList
			className="edit-site-notices"
			notices={ notices }
			onRemove={ removeNotice }
		/>
	);
};

export default class SaveButton extends React.Component {
	render() {
	  return (
		<Button
			isPrimary
			isLarge
			onClick={ () => {
				const {
					pluginWebhook
				} = this.state;

				const settings = new api.models.Settings( {
					[ 'buddy_plugin_webhook' ]: pluginWebhook
				} );
				settings.save();

				dispatch('core/notices').createNotice(
					'success',
					__( 'Settings Saved', buddy_vars.languageSlug ),
					{
					type: 'snackbar',
					isDismissible: true,
					}
				);
			}}
			>
			{ __( 'Save', buddy_vars.languageSlug ) }
		</Button>
	  );
	}
  }
