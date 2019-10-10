import React, { Component} from 'react'
import {
	StyleSheet,
	Text,
	View,
	TextInput,
	TouchableOpacity
}
from 'react-native';

export default class Logo extends Component {
  render() {
    return (
	
     <View style={styles.container}>
	
	 <TextInput style={styles.inputBox}
	 placeholder="Email"
	 placeholderTextColor = "#ffffff"
	 />
	 
	 <TextInput style={styles.inputBox}
	 placeholder="Password"
	 secureTextEntry={true}
	 placeholderTextColor = "#ffffff"
	 />
	 
	 <TouchableOpacity style={styles.button}>
	 <Text style={styles.buttonText}>Login</Text>
	 </TouchableOpacity>
	 
	 </View>
	
    )
  }
}

const styles = StyleSheet.create({
	container : {
		flex : 1 , 
		alignItems:'center',
		justifyContent:'center'
	},
	inputBox : {
		width:300,
		backgroundColor:'rgba(255,255,255,0.3)',
		borderRadius: 25,
		paddingVertical:12,
		fontSize:16,
		color:'#ffffff',
		textAlign:'center',
		marginVertical: 10
	},
	
	buttonText : {
		fontSize:16,
		fontWeight:'500',
		color:'#ffffff',
		textAlign:'center'
	},
	
	button: {
		backgroundColor:'rgba(255,255,255,0.3)',
		width:100,
		borderRadius: 25,
		marginVertical: 10,
		paddingVertical: 13
	}
});

