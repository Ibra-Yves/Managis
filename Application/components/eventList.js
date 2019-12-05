import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, FlatList, ScrollView } from 'react-native'
import EventDetails from '../components/eventDetails.js';
import EventItem from '../components/eventItem.js';

const EVENT = [
  {
    id: '1',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '2',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '3',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '4',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '5',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '6',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '7',
    title: 'Soiree Monopoly',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '8',
    title: 'Soiree react',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue du js',
    invites: ['ibra','ambroise', 'nico', 'max']
  },
  {
    id: '9',
    title: 'Soiree php',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard delvigne',
    invites: ['ibra','ambroise', 'nico', 'max']
  }
]





class EventList extends Component {

  constructor(props) {
    super(props)
    this.state = {
      events: []
    }
  }

  _displayEventDetail = (idEvent) => {
    this.props.navigation.navigate("EventDetails", {idEvent: idEvent})
  }



  render() {
    console.log(this.props.events)
    return (
      <ScrollView style={{marginTop: 10}}>
        <View style={styles.containerTitre}>
          <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('myNav')}
            style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
            <Image
              source={require('../image/icons8-menu-arrondi-50.png')}
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
              item.id.toString()}}
            renderItem={({item}) =>
            <View style={styles.container}>
              <TouchableOpacity
                onPress={() => this.props.navigation.navigate("EventDetails", {event: item})}
                style={styles.event}>
                <View style={{flex: 1}}>
                  <View style={styles.header}>
                    <View style={{flex: 2}}>
                      <Text style={styles.textTitle}>{item.title}</Text>
                    </View>
                    <View style={{flex: 1}}>
                      <Text style={styles.textDate}>{item.date}</Text>
                    </View>
                  </View>
                  <View style={styles.footer}>
                    <Text style={styles.textPlace}>{item.lieu}</Text>
                  </View>
                </View>
              </TouchableOpacity>
            </View>}
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
  },
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

export default EventList
