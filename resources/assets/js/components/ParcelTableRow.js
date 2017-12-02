import React, {Component} from 'react';
import Form from 'muicss/lib/react/form';
import Input from 'muicss/lib/react/input';
import Button from 'muicss/lib/react/button';

class ParcelTableRow extends Component{
	
	constructor(props){
		super(props);
		this.state = {
			parcels: this.props.parcels,
			weight: '',
	      	length: '',
	      	height: '',
	      	value: '',
	      	content: '',
		};

		//Binding Actions
		this.handleChange = this.handleChange.bind(this);
	}
	componentDidMount(){
		this.addParcel = this.addParcel.bind(this);
		this.removeParcel = this.removeParcel.bind(this);
	}

    handleChange(e) {
        e.target.classList.add('active');
        
        this.setState({
          [e.target.name]: e.target.value
        });
        
    }

	addParcel(e){

		e.preventDefault();

	    let newParcels = this.state.parcels;
	    let parcel = {};
	    parcel.weight = this.state.weight;
	    parcel.width = this.state.width;
	    parcel.length = this.state.length;
	    parcel.height = this.state.height;
	    parcel.value = this.state.value;
	    parcel.content = this.state.content;

	    newParcels.push(parcel);
	    this.setState({
	      parcels: newParcels
	    });
	    this.props.updateParcels(newParcels);
	    this.render();
	}

	clearInput(){
		this.setState({
			weight: '',
			length: '',
			width: '',
			height: '',
			value: '',
			content: ''

		});
		$(this).closest('form').find("input[type=text], input[type=number], textarea").val("");
	}

	removeParcel(i){
		console.log('remove');
		console.log(i);
		let newParcels = this.state.parcels;
		newParcels.splice(i, 1);
		this.setState({
	      parcels: newParcels
	    });
		this.props.updateParcels(newParcels);
	}

	render(){
		let vm = this;
		
		let table = vm.props.parcels.map((parcel, i)=>(
	      <tr key={i}>
	        <th scope="row" className="align-middle small text-center">{i+1}</th>
	        <td className="align-middle small">{parcel.weight}.00kg</td>
	        <td className="align-middle small">{parcel.width}cm x {parcel.length}cm x {parcel.height}cm</td>
	        <td className="align-middle small">{parcel.value} EUR</td>
	        <td className="align-middle small">{parcel.content}</td>
	        <td className="align-middle text-center"><i onClick={() => vm.removeParcel(i)} className="mdi mdi-delete mdi-16px text-danger"></i></td>
	      </tr>
    	));

    	if(vm.props.parcels.length<=0){
    		table = <tr><th colSpan={6}><div><p className="center-align alert alert-warning">There is no parcel, please add one to be able to send!</p></div></th></tr>
    	}
    
		return(
			<form onSubmit={vm.addParcel}>
			<div className="row px-2">
	            <div className="col-12 px-2">
	              <div className="block-modal">
	                <div className="block-modal-header p-3"><h3 className="h6 mb-0 text-uppercase">Vos colis à expédier</h3></div>
	                <div className="p-3">
	                  <div className="row px-2">
	                    <div className="col-12 col-md-3 px-2 pb-3">
	                    	<Input type="number" hint="<=30" name="weight" label="Poids en kg"  min="0" max="30" step="1" floatingLabel={false} required={true} onChange={vm.handleChange} />
	                    </div>
	                    <div className="col-12 col-md-3 px-2 pb-3">
                        	<Input type="number" hint="<=50" name="length" label="Longueur en cm"  min="0" max="50" step="1" floatingLabel={false} required={true} onChange={vm.handleChange} />
	                    </div>
	                    <div className="col-12 col-md-3 px-2 pb-3">
	                    	<Input type="number" hint="<=50" name="width" label="Largeur en cm"  min="0" max="50" step="1" floatingLabel={false} required={true} onChange={vm.handleChange} />
	                    </div>
	                    <div className="col-12 col-md-3 px-2 pb-3">
	                    	<Input type="number" hint="<=50" name="height" label="Hauteur en cm"  min="0" max="50" step="1" floatingLabel={false} required={true} onChange={vm.handleChange} />
	                    </div>
	                    <div className="col-12 col-md-3 px-2 pb-3">
	                    	<Input type="number" name="value" label="Valeur en EUR"  min="0" max="10000" step="1" floatingLabel={true} required={true} onChange={vm.handleChange} />
	                    </div>  
	                    <div className="col-12 col-md-6 px-2 pb-3">
	                    	<Input type="text" name="content" label="La nature du contenu du colis" floatingLabel={true} required={false} onChange={vm.handleChange} />
	                    </div>
	                    <div className="col-12 col-md-3 px-2 pb-3">
	                      <button type="submit" className="btn btn-block btn-outline-info btn-add">+ Ajouter le colis</button>
	                    </div> 
	                  </div>
	                  <hr className="hr-large"/>
	                  <div className="row px-2">
						<div className="col-12 px-2">
						  
						  <table className="table table-striped table-bordered table-responsive-md m-0">
							<thead>
						      <tr>
						        <th scope="col" className="small text-center">#</th>
						        <th scope="col" className="small">Poids</th>
						        <th scope="col" className="small">Dimension</th>
						        <th scope="col" className="small">Valeur</th>
						        <th colSpan={2} scope="col" className="small">Nature du contenu</th>
						      	
						      </tr>
						    </thead>
						    <tbody>
						      {table}
						    </tbody>
						</table>        
	                    </div>
	                  </div>
	                  
	                </div>
	              </div>
	            </div>
	        </div>
	        </form>
		);
	}
}

export default ParcelTableRow;