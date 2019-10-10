import React, { Component} from 'react'
import {
	StyleSheet,
	Text,
	View,
}
from 'react-native';
import Logo from '../Components/Logo.js';
import Form from '../Components/Form.js';

export default class login extends Component {
  render() {
    return (
		
     <View style={styles.container}>
		<Logo/>
		<Form/>
		<View style={styles.bottomView}>
		<Text style={styles.text}>Don't have an account yet?</Text>
		<Text style={styles.signupButton}> Signup</Text>
		</View>
	 </View>
	
    )
  }
}

const styles = StyleSheet.create({
	container : {
		backgroundColor: 'black',
		flexGrow : 1,
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