import React, { Component} from 'react'
import {
	StyleSheet,
	Text,
    View,
	StatusBar,
	TouchableOpacity
}
from 'react-native';

import Logo from '../Components/Logo.js';
import Form from '../Components/Form.js';

import { Actions } from 'react-native-router-flux';

import { KeyboardAwareScrollView } from 'react-native-keyboard-aware-scroll-view';

export default class Signup extends Component {

  goBack(){
	Actions.pop();
  }
  render() {
    return (
		
     <View style={styles.container}>
		 <KeyboardAwareScrollView>
		<Logo/>
		<Form type="Signup"/>
		<View style={styles.bottomView}>
		<Text style={styles.text}>Already have an account?</Text>
		<TouchableOpacity onPress={this.goBack}><Text style={styles.signupButton}> Sign In</Text></TouchableOpacity>
		</View>
		</KeyboardAwareScrollView>
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
		flex: 1,
		justifyContent:'center',
		color: '#C0C0C0',
		fontSize:16,
		fontWeight:'500'
	}

	
});
