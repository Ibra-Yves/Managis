import React from 'react'

import {Text, View, StyleSheet, Image, TextInput, TouchableOpacity, ScrollView} from 'react-native'
import Constants from 'expo-constants'

export default class AjoutFournitures extends React.Component {
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
          <Text style={styles.titrePage}>Ajoutez des fournitures !</Text>
        </View>
		
        <View style={{flex : 1}}>
			<TouchableOpacity
              onPress={() => this.props.navigation.openDrawer("EventDrawerNav")}
              style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
              <Image
                source={require('../Images/icons8-menu-arrondi-50.png')}
                style={styles.icon}
                />
            </TouchableOpacity>
        </View>
      </View>
	  <View>
		  <View style={styles.inputContainer}>
			  <Text style={styles.com}>Ajoutez le nom de votre fourniture !</Text>
			  <TextInput
				style = {styles.inputBox}
				placeholder = 'Nom'
				placeholderTextColor = '#FFFFFF'
			  />
			</View>
			  <View style={styles.inputContainer}>
			  <Text style={styles.com}>Ajoutez la quantité !</Text>
			  <TextInput
				style = {styles.inputBox}
				placeholder = 'Quantité'
				placeholderTextColor = '#FFFFFF'
			  />
			</View>
			<View style={styles.submitContainer}>
			  <TouchableOpacity
				onPress={() => this.props.navigation.navigate('EventList')}>
				<Text style={styles.submitButton}>Valider</Text>
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