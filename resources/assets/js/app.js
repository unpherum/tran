import './bootstrap';
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, browserHistory } from 'react-router';
import FormSendParcel from './components/FormSendParcel';
import FormListParcel from './components/FormListParcel';

import Master from './components/Master';
import CreateItem from './components/CreateItem';
import DisplayItem from './components/DisplayItem';
import EditItem from './components/EditItem';

render(
	<Router history={browserHistory}>
    	<Route path="/parcel" component={Master}>
    		<Route path="/parcel/send" component={FormSendParcel} />
			<Route path="/parcel/list" component={FormListParcel} />
    	</Route>
	</Router>,
        document.getElementById('parcel'));