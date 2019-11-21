import React, { Component } from 'react'

import { Text, StyleSheet, View } from 'react-native'



 class EventDetails extends Component {
  render() {
    const event = this.props.navigation.state.params.event
    return (
      <View>
        <Text>{event.id}</Text>
        <Text>{event.title}</Text>
        <Text>{event.date}</Text>
        <Text>{event.heure}</Text>
        <Text>{event.lieu}</Text>
      </View>

    )
  }
}

export default EventDetails
