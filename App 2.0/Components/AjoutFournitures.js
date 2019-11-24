import React from 'react'

import {Text, View, Image, TouchableOpacity, StyleSheet} from 'react-native'

export default class AjoutFournitures extends React.Component {
  render() {
    return (
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
          <Text style={styles.titrePage}>Ajoutez des fournitures</Text>
        </View>
        <View style={{flex : 1}}>
        </View>
      </View>
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
  }
})
