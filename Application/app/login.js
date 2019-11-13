import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  Image,
  View,
  TouchableOpacity,
  TextInput,
  Button,
  Keyboard
} from 'react-native';
import { StackNavigator } from 'react-navigation';


export default class login extends Component {
	static navigationOptions= ({navigation}) =>({
		  title: 'Login',
		  headerRight:
		  <TouchableOpacity
			onPress={() => navigation.navigate('Home')}
			style={{margin:10,backgroundColor:'#3A4750',padding:10}}>
			<Text style={{color:'#ffffff'}}>Home</Text>
		  </TouchableOpacity>

	});
	constructor(props){
		super(props)
		this.state={
			UserEmail:'',
			UserPassword:''
		}
	}

	login = () =>{
		const {UserEmail,UserPassword} = this.state;
		let reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
		if(UserEmail==""){

		  this.setState({email:'Entrez votre adresse mail!'})

		}

		else if(reg.test(UserEmail) === false)
		{

		this.setState({email:"Adresse mail n'est pas correct!"})
		return false;
		  }

		else if(UserPassword==""){
		this.setState({email:"Entrez votre mot de passe!"})
		}
		else{

		fetch('http://192.168.0.8/IbraManagis/connexion/User_Login.php',{
			method:'POST',
			header:{
				'Accept': 'application/json',
				'Content-type': 'application/json'
			},
			body:JSON.stringify({

				email: UserEmail,
				passwd: UserPassword
			})

		})
		.then((response) => response.json())
		 .then((responseJson)=>{
			 if(responseJson == "ok"){

				 alert("Vous êtes connecté ! ");
				 this.props.navigation.navigate("Profile");
			 }else{
				 alert("Mot de passe ou adresse mail incorect!");
			 }
		 })
		 .catch((error)=>{
		 console.error(error);
		 });
		}

		Keyboard.dismiss();
	}

  render() {
    return (
	<View style={styles.container}>
  <Image
  source={require('../image/logo_transparent.png')}
  style={styles.logo}/>
	<Text style={{padding:10,margin:10,color:'red'}}>{this.state.email}</Text>

	<TextInput
  style = {styles.inputBox}
	placeholder="Email"
  underlineColorAndroid="transparent"
	onChangeText={UserEmail => this.setState({UserEmail})}
  placeholderTextColor = '#FFFFFF'
	/>

	<TextInput
  style = {styles.inputBox}
	placeholder="Mot de passe"
  secureTextEntry = {true}
  placeholderTextColor = '#FFFFFF'
  underlineColorAndroid="transparent"
	onChangeText={UserPassword => this.setState({UserPassword})}

	/>


	<TouchableOpacity
	onPress={this.login}
	style = {styles.submitButton}>
  <Text style={{color:'white',textAlign:'center'}}>Se connecter</Text>
	</TouchableOpacity>

     </View>

   );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center'
  },
  logo: {
    width: 350,
    height: 300,
    margin: -50
  },
  inputBox : {
   width:300,
   backgroundColor:'#3A4750',
   borderRadius: 25,
   paddingVertical:12,
   fontSize:16,
   color:'#FFFFFF',
   alignItems: 'center',
   marginVertical: 10,
   textAlign: 'center'
 },
 submitButton: {
   backgroundColor:'#3A4750',
   width:100,
   borderRadius: 25,
   marginVertical: 10,
   paddingVertical: 13
 },

});

AppRegistry.registerComponent('login', () => login);
