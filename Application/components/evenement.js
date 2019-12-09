import React, { Component } from 'react'

import { View, ImageBackground, Text, TouchableOpacity, Image, StyleSheet, ScrollView, FlatList, Linking } from 'react-native'

class Evenement extends Component {
  static navigationOptions = {
    drawerIcon:(
      <Image source={require('../image/calendar-events-symbol_icon-icons.com_73071.png')}
      style={{height:24,width:24}}/>
    )
  }
  render() {
    return (
      <ImageBackground source={require('../image/header-bg.jpg')} style={{width: '100%', height: '100%'}}>
      <ScrollView>
        <View style={styles.containerTitre}>
        <TouchableOpacity
              onPress={() => this.props.navigation.navigate("Menu")}
              style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
              <Image
                source={require('../image/icons8-gauche-50.png')}
                style={styles.icon}
                />
            </TouchableOpacity>
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Gestion des événements</Text>
          </View>
          <View style={{flex : 1}}>
		  <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('myNav')}
            style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
            <Image
              source={require('../image/icons8-menu-arrondi-50.png')}
              style={styles.icon}
              />
          </TouchableOpacity>
          </View>
        </View>
        <Text style={styles.text}>Managis</Text>
        <TouchableOpacity
        onPress={() => Linking.openURL('https://managis.be/')}
        style={styles.btn1}>
        <Text style={styles.btnText}>CREER VOTRE EVENEMENT</Text>
        </TouchableOpacity>
        <TouchableOpacity
        onPress={() => Linking.openURL('https://managis.be/')}
        style={styles.btn2}>
        <Text style={styles.btnText}>EVENEMENT A VENIR</Text>
        </TouchableOpacity>
        <TouchableOpacity
        onPress={() => Linking.openURL('https://managis.be/')}
        style={styles.btn3}>
        <Text style={styles.btnText}>HISTORIQUE DE VOS EVENEMENTS</Text>
        </TouchableOpacity>
      </ScrollView>
      </ImageBackground>
    )
  }
}

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  },
  containerTitre: {
    backgroundColor:'#3A4750',
    flexDirection: 'row',
    height: 60
  },
  titrePage: {
    color: '#FFFFFF',
    fontSize: 18,
    textAlign: 'center'
  },
  btn1: {
    width: '100%',
    height: 40,
    padding: 10,
    backgroundColor: 'black',
    marginTop: 130
  },
  btn2: {
    width: '100%',
    height: 40,
    padding: 10,
    backgroundColor: 'black'
  },
  btn3: {
    width: '100%',
    height: 40,
    padding: 10,
    backgroundColor: 'black'
  },
  btnText: {
    color: 'white',
		fontWeight:'bold',
		alignItems:'center',
		justifyContent:'center',
		fontSize: 20,
    textAlign: 'center'
  },
  text: {
    color: 'yellow',
    marginTop: 60,
    textAlign: 'center',
    fontSize: 50,
    fontWeight: 'bold',
    fontStyle: 'italic'
  }
})

export default Evenement