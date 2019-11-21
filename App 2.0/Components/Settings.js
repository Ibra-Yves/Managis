import React, { Component } from 'react'

import { Text, StyleSheet, View, TouchableOpacity, ScrollView, Image } from 'react-native'



 class Settings extends Component {
  render() {
    return (
      <ScrollView>
        <View style={styles.containerTitre}>
          <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('EventDrawerNav')}
            style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
            <Image
              source={require('../Images/icons8-menu-arrondi-50.png')}
              style={styles.icon}
            />
          </TouchableOpacity>
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Paramètres</Text>
          </View>
          <View style={{flex : 1}}>
          </View>
        </View>
      </ScrollView>

    )
  }
}


const styles= StyleSheet.create({
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
  icon: {
    width: 30,
    height: 30
  }
})

export default Settings
