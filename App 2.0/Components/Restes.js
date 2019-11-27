import React, { Component } from 'react'

import { View, Text, TouchableOpacity, Image, StyleSheet, ScrollView, TextInput, FlatList } from 'react-native'
import Constants from 'expo-constants'
import ResteItem from '../Components/ResteItem'

const RESTES = [
  {
    id: '1',
    name: 'bieres',
    quantity: '15',
    place: '12 rue de la paix',
    description: "15 bières restantes d'un bac de jupiler"
  },
  {
    id: '2',
    name: 'pizza',
    quantity: '2',
    place: "2 avenue du js",
    description: "pizza 4 fromages et pizza champignon"
  },
  {
    id: '3',
    name: 'bouteille alcool',
    quantity: '4',
    place: '5 boulevard Noisette',
    description: '1 bouteille de rhum et 3 de vodka'
  }
]

class Restes extends Component {
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
            <Text style={styles.titrePage}>Marché des restes</Text>
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
        <View style={{margin: 5, alignItems: 'center'}}>
          <TextInput
            style={styles.textinput}
            placeholder='Rechercher des restes'
            placeholderTextColor='#FFFFFF'
          />
          <View>
            <TouchableOpacity style={{flexDirection: 'row'}}>
              <Image
                source={require('../Images/icons8-chercher-50.png')}
                style={styles.iconSearch}/>
              <Text style={styles.searchText}>Rechercher</Text>
            </TouchableOpacity>
          </View>
        </View>
        <View>
          <FlatList
            data={RESTES}
            keyExtractor={(item) => item.id.toString()}
            renderItem={({item}) => <ResteItem reste={item}/>}
          />
        </View>
      </ScrollView>
    )
  }
}

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  },
  iconSearch: {
    width: 20,
    height: 20,
    margin: 2
  },
  searchText: {
    alignItems: 'center',
    fontSize: 16,
    color: '#3A4750'
  },
  textinput: {
    width:300,
		backgroundColor:'#3A4750',
		borderRadius: 25,
		paddingVertical:12,
		fontSize:16,
		color:'#FFFFFF',
		textAlign:'center',
		marginVertical: 10
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
  annonce: {
    alignItems: 'center',
    fontSize: 16,

  }
})

export default Restes
