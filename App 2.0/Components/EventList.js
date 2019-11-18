import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, FlatList, ScrollView } from 'react-native'
import EventDetails from '../Components/EventDetails'
import Constants from 'expo-constants'
import EventItem from '../Components/EventItem'

/*je declare ici une serie d'event afin de tester la liste*/
const EVENT = [
  {
    id: '1',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix'
  },
  {
    id: '2',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js'
  },
  {
    id: '3',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne'
  },
  {
    id: '4',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix'
  },
  {
    id: '5',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js'
  },
  {
    id: '6',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne'
  },
  {
    id: '7',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix'
  },
  {
    id: '8',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js'
  },
  {
    id: '9',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne'
  }
]


class EventList extends Component {

  _displayEventDetail = (idEvent) => {
    //console.log("display details event :" + idEvent)
    this.props.navigation.navigate("EventDetails", {idEvent: idEvent})
  }



  render() {
    return (
      <ScrollView style={{marginTop: Constants.statusBarHeight}}>
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
            <Text style={styles.titrePage}>Liste des événements</Text>
          </View>
          <View style={{flex : 1}}>
          </View>
        </View>
          <FlatList
            data={EVENT}
            keyExtractor={function(item) {
              console.log(item.id)
              item.id}}
            renderItem={({item}) => <EventItem event={item}/>}
          />

      </ScrollView>
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

export default EventList
