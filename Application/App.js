import React, { Component } from 'react'
import {
	StyleSheet,
	Text,
	View,
	StatusBar
}
from 'react-native';


import Login from './Components/Login.js';
import Signup from './Components/Signup.js';

import { KeyboardAwareScrollView } from 'react-native-keyboard-aware-scroll-view';

export default class App extends Component {
  render() {
    return (
     <View style={styles.container}>
	 <KeyboardAwareScrollView>
	 	<StatusBar
	 	backgroundColor="white"
		 barStyle="light-content"
	 	/>

	 <Signup/>
	 </KeyboardAwareScrollView>
	 </View>
	
    );
  }
}

const styles = StyleSheet.create({
	container : {
		backgroundColor: 'black',
		flexGrow: 1,
		alignItems:'center',
		justifyContent:'center'
	}
});
