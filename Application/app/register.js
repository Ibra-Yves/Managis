import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  Button,
  TextInput,
  TouchableOpacity,
  Image
} from 'react-native';


export default class register extends Component {
  constructor(props) {
    super(props)
    this.state = {
      userName: '',
      userEmail: '',
      userPassword: ''
    }
  }

  userRegister = () => {

    const { userName } = this.state;
    const { userEmail } = this.state;
    const { userPassword } = this.state;
    let reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (userEmail == "") {

      this.setState({ email: 'Entrez votre adresse mail!' })

    }

    else if (reg.test(userEmail) === false) {

      this.setState({ email: "Adresse mail n'est pas correct!" })
      return false;
    }

    else if (userPassword == "") {
      this.setState({ email: "Entrez votre mot de passe!" })
    }
    else {

      fetch('https://managis.be/GestionApp/user_registration.php', {
        //fetch('http://localhost:8878/ManagisApp/ManagisApp/inscription/user_registration.php',{
        method: 'post',
        header: {
          'Accept': 'application/json',
          'Content-type': 'application/json'
        },
        body: JSON.stringify({
          pseudo: userName,
          email: userEmail,
          passwd: userPassword,
        })

      })
        .then((response) => response.json())
        .then((responseJson) => {
          alert('Le compte a bien été créé.');
        })
        .catch((error) => {
          console.error(error);
        });
    }
  }

  render() {
    return (
      <View style={styles.container}>
        <Image
          source={require('../image/logo_transparent.png')}
          style={styles.logo} />
        <Text style={{ padding: 10, margin: 10, color: 'red' }}>{this.state.email}</Text>

        <TextInput
          placeholder="Nom"
          style={styles.inputBox}
          underlineColorAndroid="transparent"
          onChangeText={userName => this.setState({ userName })}
          placeholderTextColor='#FFFFFF'

        />

        <TextInput
          placeholder="Email"
          placeholderTextColor='#FFFFFF'
          style={styles.inputBox}
          underlineColorAndroid="transparent"
          onChangeText={userEmail => this.setState({ userEmail })}
        />

        <TextInput
          placeholder="Mot de passe"
          style={styles.inputBox}
          secureTextEntry={true}
          placeholderTextColor='#FFFFFF'
          underlineColorAndroid="transparent"
          onChangeText={userPassword => this.setState({ userPassword })}
        />

        <TouchableOpacity
          onPress={this.userRegister}
          style={styles.submitButton}>
          <Text style={{ color: 'white', textAlign: 'center' }}>S'inscrire</Text>
        </TouchableOpacity>

        <TouchableOpacity
          onPress={() => this.props.navigation.navigate("Login")}>
          <Text>Vous avez déjà un compte ? Connectez vous !</Text>
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
  }
});

AppRegistry.registerComponent('register', () => register);
