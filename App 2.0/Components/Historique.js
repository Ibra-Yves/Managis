import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, ScrollView, FlatList } from 'react-native'

import PastEvent from '../Components/PastEvent'

const HISTORIQUE = [
  {
    id: '1',
    name: 'sprint 1',
    date: '10 septembre 2019',
    heure: '8h30',
    lieu: 'EPHEC'
  },
  {
    id: '2',
    name: 'sprint 2',
    date: '24 septembre 2019',
    heure: '8h30',
    lieu: 'EPHEC'
  },
  {
    id: '3',
    name: 'sprint 3',
    date: '7 octobre 2019',
    heure: '8h30',
    lieu: 'EPHEC'
  },
  {
    id: '4',
    name: 'sprint 4',
    date: '21 octobre 2019',
    heure: '8h30',
    lieu: 'EPHEC'
  },
  {
    id: '5',
    name: 'sprint 5',
    date: '5 novembre 2019',
    heure: '8h30',
    lieu: 'EPHEC'
  }
]



class Historique extends Component {
  render() {
    return (
      <ScrollView>
        <View style={styles.containerTitre}>
          <TouchableOpacity
          onPress={() => this.props.navigation.goBack()}
          style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
          <Image
            source={require('../Images/icons8-gauche-50.png')}
            style={styles.icon}
            />
        </TouchableOpacity>
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Vos événements passés</Text>
          </View>
          <View style={{flex : 1}}>
		  <TouchableOpacity
            onPress={() => this.props.navigation.openDrawer('EventDrawerNav')}
            style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
            <Image
              source={require('../Images/icons8-menu-arrondi-50.png')}
              style={styles.icon}
            />
          </TouchableOpacity>
          </View>
        </View>
        <FlatList
          data={HISTORIQUE}
          keyExtractor={(item) => item.id}
          renderItem={({item}) => <PastEvent past={item}/>}
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

export default Historique
