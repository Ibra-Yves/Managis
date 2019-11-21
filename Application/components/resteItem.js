import React from 'react'

import { StyleSheet, View, Text, Image, TouchableOpacity } from 'react-native'



class EventItem extends React.Component {
  render() {
    const reste = this.props.reste


    return (
      <View style={styles.container}>
        <TouchableOpacity
          onPress={() => this.props.navigation.openDrawer('Event')}
          style={styles.event}>
          <View style={{flex: 1}}>
            <View style={styles.header}>
              <View style={{flex: 2}}>
                <Text style={styles.textTitle}>{reste.name}</Text>
              </View>
              <View style={{flex: 1}}>
                <Text style={styles.textDate}>{reste.quantity}</Text>
              </View>
            </View>
            <View style={styles.footer}>
              <Text style={styles.textPlace}>{reste.description}</Text>
            </View>
          </View>
        </TouchableOpacity>
      </View>
    )
  }
}

const styles= StyleSheet.create({
  container: {
    height: 100,
    padding: 12,
    paddingBottom: 3
  },
  event: {
    flex: 1,
    backgroundColor: '#3A4750'
  },
  header: {
    flexDirection: 'row',
    flex: 1
  },
  footer: {
    flex: 1,
    justifyContent: 'center',
    marginLeft: 5
  },
  textTitle: {
    color: '#FFFFFF',
    fontSize: 22,
    margin: 5,
    marginTop: 2
  },
  textDate: {
    color: '#FFFFFF',
    fontSize: 12,
    margin: 5,
    marginTop: 10
  },
  textPlace: {
    color: '#FFFFFF',
    fontSize: 16,

  }

})

export default EventItem
