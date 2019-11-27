import React, { Component } from 'react'

import {Text, View, StyleSheet, Image, TextInput, TouchableOpacity, ScrollView} from 'react-native'
import Constants from 'expo-constants'

export default class CreateAnnonce extends Component {
  render() {
    return (
      <ScrollView style={{marginTop: Constants.statusBarHeight}}>
        <View style={styles.containerTitre}>
		<TouchableOpacity
          onPress={() => this.props.navigation.goBack()}
          style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
          <Image
            source={require('../Images/icons8-gauche-50.png')}
            style={styles.icon}
            />
        </TouchableOpacity>
          
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Créer une annonce !</Text>
          </View>
          <View style={{flex : 1}}>
		  <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('EventDrawerNav')}
            style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
            <Image
              source={require('../Images/icons8-menu-arrondi-50.png')}
              style={styles.icon}
              />
          </TouchableOpacity>
          </View>
        </View>
        <View >
        <View style={styles.inputContainer}>
          <Text style={styles.com}>Quel est votre reste ?</Text>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Ex : bac de bière'
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.inputContainer}>
          <Text>Spécifiez la quantité</Text>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Quantité'
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.inputContainer}>
          <Text>Ajoutez le lieu de l'échange</Text>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Ex: 2 rue du ciseau'
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.inputContainer}>
          <Text>Ajoutez une description</Text>
          <TextInput
            style = {styles.inputBox}
            placeholder = 'Description'
            placeholderTextColor = '#FFFFFF'
          />
        </View>
        <View style={styles.submitContainer}>
          <TouchableOpacity
            onPress={() => this.props.navigation.navigate('AnnoncePerso')}>
            <Text style={styles.submitButton}>Créer</Text>
          </TouchableOpacity>
        </View>
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
  titrePage: {
      color: '#FFFFFF',
      fontSize: 18,
      textAlign: 'center'
    },
  containerTitre: {
    backgroundColor:'#3A4750',
    flexDirection: 'row',
    height: 60
  },
  signupButton: {
    textAlign: 'center',
    marginVertical: 10,
    paddingVertical: 13,
    color: '#3A4750'
  },
  icon: {
    height: 30,
    width: 30
  },
  com: {
    marginTop: 10,
  }
})
