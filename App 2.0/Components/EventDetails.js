import React, { Component } from 'react'

import { Text, TouchableOpacity, StyleSheet, ActivityIndicator, View } from 'react-native'



 class EventDetails extends Component {

  constructor(props) {
   super(props)
   this.state = {
     event: undefined,
     isLoading: true
   }
  }

  _displayLoading() {
    if (this.state.isLoading) {
      return (
        <View style={styles.loading_container}>
          <ActivityIndicator size='large'/>
        </View>
      )
    }
  }



  componentDidMount() {
    console.log("Component EventDetails monté")

  }

  render() {
    console.log("Component EventDetails rendu")
    const idEvent = this.props.navigation.state.params.idEvent
    return (
        <View style={{flex: 1}}>
          {this._displayLoading()}
        </View>
    )
  }
}

const styles= StyleSheet.create({
  loading_container: {
    position: 'absolute',
    left: 0,
    right: 0,
    top: 0,
    bottom: 0,
    alignItems: 'center',
    justifyContent: 'center'
  }
})

export default EventDetails
