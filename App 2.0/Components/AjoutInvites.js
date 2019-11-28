import React from 'react'

import {Text, View, Image, TouchableOpacity, StyleSheet, ScrollView, TextInput, FlatList} from 'react-native'

const USER=[
  {
    id: '1',
    pseudo: 'Athos',
    mail: 'a.chelle@students.ephec.be'
  },
  {
    id: '2',
    pseudo: 'Playmobiiatch',
    mail: 'remy.vase3@hotmail.fr'
  },
  {
    id: '3',
    pseudo: 'ibra',
    mail: ''
  },
  {
    id: '4',
    pseudo: 'nico7',
    mail: ''
  },
  {
    id: '5',
    pseudo: 'satantoaster',
    mail: ''
  }
]



export default class AjoutInvites extends React.Component {

  filtreInvites(pseudoInv){
    for(let i = 0; i < USER.length; i++){
      if(pseudoInv === USER[i].pseudo){
        this.username = USER[i].pseudo
        break
      }
      else{
        this.username = "Cet utilisateur n'existe pas"
      }
    }
  }

  checkInvite(inv){
    for(let i = 0; i < USER.length; i++){
      if(inv == USER[i].pseudo){
        console.log("Ajout de l'invité avec succès")
        break
      }
      else{
        console.log("L'invité est peut-être déjà invité")
      }
    }
  }

  afficheListe(){
    this.setState({showForm: 0})
  }

  rechercheFonction(){
    this.filtreInvites(this.username)
    this.afficheListe()
  }


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
		  <TouchableOpacity
              onPress={() => this.props.navigation.openDrawer("EventDrawerNav")}
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
            onChangeText={(text) => this.username = text}
            placeholder='Rechercher un utilisateur'
            placeholderTextColor='#FFFFFF'
            onSubmitEditing={() => this.rechercheFonction()}
          />
          <View>
            <TouchableOpacity style={{flexDirection: 'row'}}
              onPress={() => this.rechercheFonction()}>
              <Image
                source={require('../Images/icons8-chercher-50.png')}
                style={styles.iconSearch}/>
              <Text style={styles.searchText}>Rechercher</Text>
              
            </TouchableOpacity>
          </View>
        </View>
          <View>
            <View style={{flexDirection: 'row', margin: 6, marginTop: 3, marginBottom: 3, height: 50, borderWidth: 2, borderRadius: 25, borderColor: '#3A4750'}}>
              <View style={{flex: 1}}>
              </View>
              <View style={{justifyContent: 'center', flexDirection: 'row', flex: 4, alignItems: 'center'}}>
                <View>
                  <Text>{this.username}</Text>
                </View>
              </View>
              <TouchableOpacity
                onPress={() => this.checkInvite(this.username)}
                style={{flex: 1, justifyContent: 'center', alignItems: 'center'}}>
                <Image
                  source={require('../Images/icons8-ajouter-administrateur-50.png')}
                  style={{width: 30, height: 30}}/>
              </TouchableOpacity>
              <View style={{flex: 1}}>
              </View>
            </View>
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