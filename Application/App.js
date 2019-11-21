import React, { Component } from 'react';
import {
	StyleSheet,
	View,
	StatusBar
}
from 'react-native';

import Routes from "./pages/Routes.js";

//import { KeyboardAwareScrollView } from 'react-native-keyboard-aware-scroll-view';


export default class App extends Component {
  render() {
    return (
     <View style={styles.container}> 
	 		<StatusBar
	 		backgroundColor="white"
		 	barStyle="light-content"
	 		/>
	 		<Routes/>
	 </View>
	
    );
  }
}

const styles = StyleSheet.create({
	container : {
		backgroundColor: '#455a64',
		flex: 1,
		//alignItems:'center',
		justifyContent:'center'
	}
});
