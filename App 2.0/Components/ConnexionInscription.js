import React, { Component } from 'react'

import {Text, View, StyleSheet, Image, TextInput, TouchableOpacity, ScrollView} from 'react-native'

export default class ConnexionInscription extends Component {
  render() {
    return (
      <ScrollView>
        <View style={styles.logoContainer}>
          <Image
            source={require('../Images/logo_transparent.png')}
            style={styles.logo}/>
        </View>
        <View style={styles.inputContainer}>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Pseudo - email'
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.inputContainer}>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Mot de passe'
            secureTextEntry = {true}
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.submitContainer}>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate('EventList')}
            >
            <Text style={styles.submitButton}>Se connecter</Text>
          </TouchableOpacity>
        </View>
        <View style={styles.signupButton}>
          <TouchableOpacity>
            <Text>Pas encore de compte ?</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    )
  }
}

const styles = StyleSheet.create({
  logo: {
    width: 350,
    height: 350
  },
  logoContainer: {
    alignItems: 'center',
    justifyContent: 'flex-end'
  },
  inputContainer: {
    alignItems: 'center',
    justifyContent: 'flex-end'
  },
  submitContainer: {
    alignItems: 'center',
    justifyContent: 'flex-end'
  },
  inputBox : {
		width:300,
		backgroundColor:'#3A4750',
		borderRadius: 25,
		paddingVertical:12,
		fontSize:16,
		color:'#FFFFFF',
		textAlign:'center',
		marginVertical: 10
	},
  submitButton: {
    backgroundColor:'#3A4750',
		width:100,
		borderRadius: 25,
		marginVertical: 10,
		paddingVertical: 13,
    textAlign: 'center',
    color: '#FFFFFF'
  },
  signupButton: {
    textAlign: 'center',
    marginVertical: 10,
    paddingVertical: 13,
    color: '#3A4750'

  }
})
