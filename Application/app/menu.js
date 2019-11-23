import React, { Component } from 'react';
import { AppRegistry,
				View,
				Text,
				StyleSheet,
				Button,
				TouchableOpacity,
				StatusBar,
				ImageBackground,
			 	Image,
				ScrollView} from 'react-native';

export default class menu extends Component{
static navigationOptions= ({navigation}) =>({
			headerRight:
		  <TouchableOpacity
			onPress={() => navigation.navigate('Home')}
			style={{margin:10,backgroundColor:'#3A4750',padding:10}}>
			<Text style={{color:'#ffffff'}}>Se deconnecter</Text>
		  </TouchableOpacity>
	});

	render(){
		const { navigate } = this.props.navigation;
		return(
		<ImageBackground source={require('../image/test.jpg')} style={{width: '100%', height: '100%'}}>
		<ScrollView>
	  <View style={styles.container}>
		<Image
	  source={require('../image/logo_transparent.png')}
	  style={styles.logo}/>
		<TouchableOpacity
		onPress={()=> navigate('Profile')}
		style={styles.btn2}>
		<Text style={styles.btnText}>Profil</Text>
		</TouchableOpacity>
		<TouchableOpacity
		onPress={()=> navigate('EventList')}
		style={styles.btn2}>
		<Text style={styles.btnText}>Gestion des evenements</Text>
		</TouchableOpacity>
    </View>
		</ScrollView>
		</ImageBackground>
		);
	}
}
const styles = StyleSheet.create({
	container:{
		display:'flex',
		alignItems:'center',
		justifyContent:'center'
	},
	logo: {
    width: 400,
    height: 350
	},
	btn2:{
		backgroundColor:'#3A4750',
		padding:10,
		margin:15,
		width:'80%',
		alignItems:'center',
		justifyContent:'center',
		borderRadius: 10
	},
	btnText:{
		color:'white',
		fontWeight:'bold',
		fontSize: 20,
		alignItems:'center',
		justifyContent:'center'
	},

});


AppRegistry.registerComponent('menu', () => menu);
