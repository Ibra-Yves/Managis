import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet } from 'react-native'

class Restes extends Component {
  render() {
    return (
      <View>
        <TouchableOpacity
          onPress={() => this.props.navigation.openDrawer('EventDrawerNav')}>
          <Image
            source={require('../Images/icons8-menu-arrondi-50.png')}
            style={styles.icon}
          />
        </TouchableOpacity>
        <Text>Ici les restes</Text>
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

export default Restes
