import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, ScrollView, FlatList } from 'react-native'
import InvitItem from '../components/invitItem.js'

const INVIT = [
  {
    id: '1',
    title: 'Soiree Elastique',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '12 rue de la paix'
  },
  {
    id: '2',
    title: 'Soiree Bellini',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: '2 avenue des shots'
  },
  {
    id: '3',
    title: 'Soiree Vodka/Tasse',
    date: '12 decembre 2020',
    heure: '19h30',
    lieu: '4 boulevard airbnb'
  },
  {
    id: '4',
    title: 'Soiree Poker Menteur',
    date: '20 novembre 2019',
    heure: '22h00',
    lieu: '2 rue du plongeon d ibra'
  },
  {
    id: '5',
    title: 'Soiree Vodka Noisette',
    date: '16 novembre 2019',
    heure: '18h00',
    lieu: 'smah'
  }
]

function Item({title}) {
  return (
    <View>
      <Text>{title}</Text>
    </View>
  )
}

class Invitation extends Component {
  render() {
    return (
      <ScrollView>
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
            <Text style={styles.titrePage}>Vos invitations</Text>
          </View>
          <View style={{flex : 1}}>
          </View>
        </View>
        <FlatList
          data={INVIT}
          keyExtractor={(item) => item.id}
          renderItem={({item}) => <InvitItem invit={item}/>}
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

export default Invitation
