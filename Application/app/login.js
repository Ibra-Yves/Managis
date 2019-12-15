import React, { Component } from 'react';
import {
	AppRegistry,
	StyleSheet,
	Text,
	Image,
	View,
	TouchableOpacity,
	TextInput,
	Keyboard,
	AsyncStorage,
	SafeAreaView
} from 'react-native';


export default class login extends Component {

	constructor(props) {
		super(props)
		this.state = {
			UserEmail: '',
			UserName: '',
			UserPassword: '',
			user_name: '',
			avatar_url: '',
			avatar_show: false,
			UserId: '',

		}
	}

	login = () => {
		const { UserEmail, UserPassword, UserName } = this.state;
		//let reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (UserEmail == "") {

			this.setState({ email: 'Entrez votre adresse mail!' })

		}
		
		else if (UserPassword == "") {
			this.setState({ passwd: "Entrez votre mot de passe!" })
		}
		else {

				fetch('https://managis.be/GestionApp/User_Login.php', {
				//fetch('http://localhost:8878/ManagisApp/ManagisApp/connexion/User_login.php',{
				method: 'POST',
				header: {
					'Accept': 'application/json',
					'Content-type': 'application/json'
				},
				body: JSON.stringify({

					email: UserEmail,
					pseudo: UserName,
					passwd: UserPassword,

				})

			})
				.then((response) => response.json())
				.then((responseJson) => {
					if (responseJson[0] == "ok") {


						this.props.navigation.navigate("Restes");

						//Je crée la session ici et j'attribue des valeurs retournées par User_Login.php
						AsyncStorage.setItem('UserId', responseJson[1]);
						AsyncStorage.setItem('UserEmail', responseJson[2]);
						AsyncStorage.setItem('UserName', responseJson[3]);

					} else {
						alert("Mot de passe ou adresse mail incorrect!");
					}
				})
				.catch((error) => {
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

			this.setState({ avatar_url: this.props.navigation.navigate("Restes") });

			this.setState({ avatar_show: true })

			console.log(result);

		}
	}
	

	render() {
		return (
			<SafeAreaView style={{ flex: 1 }}>
				<View style={styles.container}>
					<Image
						source={require('../image/logo_transparent.png')}
						style={styles.logo} />
					<Text style={{ padding: 10, margin: 10, color: 'red' }}>{this.state.email}</Text>

					<TextInput
						style={styles.inputBox}
						placeholder="Pseudo"
						underlineColorAndroid="transparent"
						onChangeText={UserEmail => this.setState({ UserEmail })}
						placeholderTextColor='#FFFFFF'
					/>

					<TextInput
						style={styles.inputBox}
						placeholder="Mot de passe"
						secureTextEntry={true}
						placeholderTextColor='#FFFFFF'
						underlineColorAndroid="transparent"
						onChangeText={UserPassword => this.setState({ UserPassword })}

					/>

					<TouchableOpacity
						onPress={this.login}
						style={styles.submitButton}>
						<Text style={{ color: 'white', textAlign: 'center' }}>Se connecter</Text>
					</TouchableOpacity>

					<TouchableOpacity
						onPress={() => this.props.navigation.navigate("Register")}>
						<Text>Pas encore de compte ? Inscrivez vous !</Text>
					</TouchableOpacity>

					{this.state.avatar_url ?
						<Image
							source={{ uri: this.state.avatar_url }}
							style={styles.imageStyle} /> : null}

					<Text style={styles.text}> {this.state.user_name} </Text>

				</View>
			</SafeAreaView>
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

	inputBox: {
		width: 300,
		backgroundColor: '#3A4750',
		borderRadius: 25,
		paddingVertical: 12,
		fontSize: 16,
		color: '#FFFFFF',
		alignItems: 'center',
		marginVertical: 10,
		textAlign: 'center'
	},
	submitButton: {
		backgroundColor: '#3A4750',
		width: 100,
		borderRadius: 25,
		marginVertical: 10,
		paddingVertical: 13
	},

});

AppRegistry.registerComponent('login', () => login);