import React, {Component} from 'react';
import Stepper from 'react-stepper-horizontal'

class StepperMaster extends Component {

	constructor(props) {
		super(props);
		this.state = {
			step: this.props.step
		};
  	}

	componentDidMount(){

	}

	render(){
		let vm = this;
		return (
			<div className="stepper">
				<Stepper steps={[{title: 'Package'},{title: 'Offers'},{title: 'Address'},{title: 'Payment'},{title: 'Confirmation'}]} activeStep={ vm.props.step } />
			</div>
		);
	}
}

export default StepperMaster;