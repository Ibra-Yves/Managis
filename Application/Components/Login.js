import React, { Component} from 'react'
import {
	StyleSheet,
	Text,
	View,
	TouchableOpacity
}
from 'react-native';
import Logo from '../Components/Logo.js';
import Form from '../Components/Form.js';

import { Actions } from 'react-native-router-flux';

export default class login extends Component {

  signup() {
	Actions.signup()
  }

  render() {
    return (
		
     <View style={styles.container}>
		<Logo/>
		<Form type="Login"/>
		<View style={styles.bottomView}>
		<Text style={styles.text}>Don't have an account yet?</Text>
		<TouchableOpacity onPress={this.signup}><Text style={styles.signupButton}> Signup</Text></TouchableOpacity>
		</View>
	 </View>
	
    )
  }
}
const styles = StyleSheet.create({
	container : {
		backgroundColor: 'black',
		flex : 1,
		alignItems:'center',
		justifyContent:'center'
	},
	bottomView:{
 
		width: '100%', 
		height: 50, 
		color:'rgb(255,255,255)',
		justifyContent: 'center', 
		alignItems: 'center',
		position: 'absolute',
		bottom: -100
	  },
	text: {
		color: 'rgb(255,255,255)',
		fontSize:16
	},
	signupButton: {
		
		justifyContent:'center',
		color: '#C0C0C0',
		fontSize:16,
		fontWeight:'500'
	}
	
});
