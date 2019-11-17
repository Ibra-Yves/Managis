import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet } from 'react-native'

class Invitation extends Component {
  render() {
    const { navigate } = this.props.navigation;
    return (
      <View>
      <TouchableOpacity
        onPress={() => navigate('EventList')}
        style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
        <Image
          source={require('../image/icons8-menu-arrondi-50.png')}
            style={styles.icon}
            />
        </TouchableOpacity>
        <Text>Ici les invit</Text>
      </View>
    )
  }
}

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  }
})

export default Invitation
