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
  Keyboard,
  AsyncStorage
} from 'react-native';
import { StackNavigator } from 'react-navigation';

import { LoginButton, AccessToken, GraphRequest, GraphRequestManager } from 'react-native-fbsdk';

export default class login extends Component {
	constructor(props){
		super(props)
		this.state={
			UserEmail:'',
      UserName:'',
			UserPassword:'',
      user_name: '',
      avatar_url: '',
      avatar_show: false
		}
	}

	login = () =>{
		const {UserEmail,UserPassword,UserName} = this.state;
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
		this.setState({passwd:"Entrez votre mot de passe!"})
		}
		else{

		fetch('http://10.99.1.188/ManagisApp/connexion/User_Login.php',{
			method:'POST',
			header:{
				'Accept': 'application/json',
				'Content-type': 'application/json'
			},
			body:JSON.stringify({

				email: UserEmail,
        pseudo: UserName,
				passwd: UserPassword
			})

		})
		.then((response) => response.json())
		 .then((responseJson)=>{
			 if(responseJson == "ok"){

				 alert("Vous êtes connecté ! ");
				 this.props.navigation.navigate("Menu");

        AsyncStorage.setItem('UserEmail',UserEmail);
        AsyncStorage.setItem('UserName',UserName);

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

  get_Response_Info = (error, result) => {
    if (error) {
      Alert.alert('Error fetching data: ' + error.toString());
    } else {

      this.setState({ user_name: 'Welcome' + ' ' + result.name });

      this.setState({ avatar_url: this.props.navigation.navigate("Menu")});

      this.setState({ avatar_show: true })

      console.log(result);

    }
  }
  onLogout = () => {

    this.setState({ user_name: null, avatar_url: null, avatar_show: false });

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

  {this.state.avatar_url ?
         <Image
           source={{ uri: this.state.avatar_url }}
           style={styles.imageStyle} /> : null}

       <Text style={styles.text}> {this.state.user_name} </Text>

       <LoginButton
         readPermissions={['public_profile']}
         onLoginFinished={(error, result) => {
           if (error) {
             console.log(error.message);
             console.log('login has error: ' + result.error);
           } else if (result.isCancelled) {
             console.log('login is cancelled.');
           } else {
             AccessToken.getCurrentAccessToken().then(data => {
               console.log(data.accessToken.toString());

               const processRequest = new GraphRequest(
                 '/me?fields=name,picture.type(large)',
                 null,
                 this.get_Response_Info
               );
               // Start the graph request.
               new GraphRequestManager().addRequest(processRequest).start();

             });
           }
         }}
         onLogoutFinished={this.onLogout}
       />

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
  imageStyle: {

    width: 200,
    height: 300,
    resizeMode: 'contain'
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
