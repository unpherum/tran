import React, {Component} from 'react'
import { Router, Route, Link } from 'react-router'
import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();

class Master extends Component {

	constructor(props) {
		super(props);
		this.state = {};
	}
	componentDidMount(){

	}
	render(){
		return (
			<div className="container">
				<div>
					{this.props.children}
				</div>
			</div>
		)
	}
}
export default Master;