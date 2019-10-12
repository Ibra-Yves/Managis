import React, { Component} from 'react'
import {
	StyleSheet,
	Text,
	View,
	Image
}
from 'react-native';

export default class Logo extends Component  {
  render() {
    return (
     <View style={styles.container}>
	 <Image style={{width:350,height: 300}}
		source={require('../backgroundimage/images/managis.jpg')}/>
		<Text style={styles.logoText}> Welcome to Managis App </Text>
		
	 </View>
    )
  }
}

const styles = StyleSheet.create({
	container : {
		flexGrow: 1,
		alignItems:'center',
		justifyContent:'flex-end'
	},
	logoText : {
		marginVertical : 15,
		fontSize:25,
		color:'rgba(255,255,255,0.7)'
}
});
