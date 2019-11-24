import React from 'react'

import {Text, View, Image, TouchableOpacity, StyleSheet, ScrollView, TextInput, FlatList} from 'react-native'

const USER=[
  {
    id: '1',
    nom: 'Chirac',
    prenom: 'Patrick',
    mail: 'patrick.chirac@camping.com'
  },
  {
    id: '2',
    nom: 'Tuning',
    prenom: 'Jacky',
    mail: 'jacky.tuning@keke.com'
  }
]

export default class AjoutInvites extends React.Component {
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
            <Text style={styles.titrePage}>Ajoutez un invité</Text>
          </View>
          <View style={{flex : 1}}>
          </View>
        </View>
        <View style={{margin: 5, alignItems: 'center'}}>
          <TextInput
            style={styles.textinput}
            placeholder='Rechercher un utilisateur'
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
            data={USER}
            keyExtractor={(item) => item.id.toString()}
            renderItem={({item}) => <Text>{item.nom}</Text>}
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
})
