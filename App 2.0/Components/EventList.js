import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, FlatList } from 'react-native'
import EventDetails from '../Components/EventDetails'

/*je declare ici une serie d'event afin de tester la liste*/
const EVENT = [
  {
    id: '1',
    title: 'Soiree Monopoly',
    date: 'date de l\'event',
    heure: 'heure de l\'event'
  },
  {
    id: '2',
    title: 'Soiree react',
    date: 'date de l\'event',
    heure: 'heure de l\'event'
  },
  {
    id: '3',
    title: 'Soiree php',
    date: 'date de l\'event',
    heure: 'heure de l\'event'
  }
]


class EventList extends Component {
  render() {
    return (

      <View>
      <TouchableOpacity
        onPress={() => this.props.navigation.openDrawer('EventDrawerNav')}
        style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
        <Image
          source={require('../Images/icons8-menu-arrondi-50.png')}
          style={styles.icon}
          />
      </TouchableOpacity>
        <FlatList
          data={EVENT}
          extraData={this.state}
          renderItem={({item}) => (
            <TouchableOpacity><Text>{item.title} {'\n'} {item.heure}</Text></TouchableOpacity>

          )}
        />
      </View>
    )
  }
}

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  },
  item: {
    backgroundColor: '#f9c2ff',
    padding: 20,
    marginVertical: 8,
    marginHorizontal: 16,
  }
})

export default EventList
