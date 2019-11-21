import React from 'react'

import { StyleSheet, View, Text, Image, TouchableOpacity } from 'react-native'



class PastEvent extends React.Component {
  render() {
    const past = this.props.past


    return (
      <View style={styles.container}>
        <TouchableOpacity
          //onPress={() => this.props.navigation.navigate("Event")}
          style={styles.event}>
          <View style={{flex: 1}}>
            <View style={styles.header}>
              <View style={{flex: 2}}>
                <Text style={styles.textTitle}>{past.name}</Text>
              </View>
              <View style={{flex: 1}}>
                <Text style={styles.textDate}>{past.date}</Text>
              </View>
            </View>
            <View style={styles.footer}>
              <Text style={styles.textPlace}>{past.lieu}</Text>
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

export default PastEvent
