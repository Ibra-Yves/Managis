import React, { Component } from 'react';

import {
  AppRegistry,
  Image,
  ScrollView,
  TextInput,
  TouchableOpacity,
  StyleSheet,
  Text,
  View,
  Alert,
  AsyncStorage,
  FlatList,
  ActivityIndicator,
  RefreshControl,
  SafeAreaView
} from 'react-native';


class EventFutur extends Component {

  constructor(props) {
    super(props)
    this.state = {
      UserName: [],
      data: [],
      refreshing: true
    }
  }

  //On récupère l'id de l'utilisateur connecté pour n'afficher que ses annonces.
  componentWillMount() {
    this._loadInitialState().done();
  }

  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserName');
    if (value !== null) {
      this.setState({ UserName: value });
    }
    this.recuperationDonneeEventPerso()
  }

  //on récupère les données sous forme de tableau qui sont envoyées par le fichier "restes.php" et on les met dans la variable data pour pouvoir les traiter.
  recuperationDonneeEventPerso = () => {
    fetch('https://managis.be/GestionApp/EventFutur.php', {
    //fetch('http://localhost:8878/ManagisApp/ManagisApp/evenements/EventFutur.php', {
      method: 'POST',
      header: {
        'Accept': 'application/json',
        'Content-type': 'application/json'
      },
      body: JSON.stringify({
        userName: this.state.UserName,
      })

    })
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({ refreshing: false })
        this.setState({ data: responseJson });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  traductionDate(date) {
    ret = ''
    year = date.substring(0, 4)
    month = date.substring(5, 7)
    day = date.substring(8, 10)
    switch (month) {
      case '01':
        month = 'Janvier'
        break
      case '02':
        month = 'Février'
        break
      case '03':
        month = 'Mars'
        break
      case '04':
        month = 'Avril'
        break
      case '05':
        month = 'Mai'
        break
      case '06':
        month = 'Juin'
        break
      case '07':
        month = 'Juillet'
        break
      case '08':
        month = 'Août'
        break
      case '09':
        month = 'Septembre'
        break
      case '10':
        month = 'Octobre'
        break
      case '11':
        month = 'Novembre'
        break
      case '12':
        month = 'Décembre'
        break
    }

    ret = ret.concat(day, ' ', month, ' ', year)
    return ret
  }

  traductionPartcicipe(participe) {
    ret = ''
    if (participe == 0) {
      ret = 'Oui'
    } else {
      ret = 'Non'
    }
    return ret
  }

  onRefresh() {
    //Clear old data of the list
    this.setState({ data: [] });
    //Call the Service to get the latest data
    this.recuperationDonneeEventPerso();
  }

  render() {

    if (this.state.refreshing) {
      return (
        //loading view while data is loading
        <View style={{ flex: 1, paddingTop: 20 }}>
          <ActivityIndicator />
        </View>
      );
    }

    return (
      <SafeAreaView style={{ flex: 1 }}>
        <ScrollView
          refreshControl={
            <RefreshControl
              //refresh control used for the Pull to Refresh
              refreshing={this.state.refreshing}
              onRefresh={this.onRefresh.bind(this)}
            />
          }>
          <View style={{ flexDirection: 'row', backgroundColor: '#3A4750', height: 60 }}>
            <View style={{ alignItems: 'center', justifyContent: 'center', flex: 1 }}>
              <TouchableOpacity
                onPress={() => this.props.navigation.goBack()}
              >
                <Image
                  source={require('../image/icons8-gauche-50.png')}
                  style={styles.icon}
                />
              </TouchableOpacity>
            </View>
            <View style={{ flex: 6, justifyContent: 'center' }}>
              <Text style={styles.titrePage}>Vos événements</Text>
            </View>
            <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>

            </View>
          </View>
          <FlatList
            data={this.state.data}
            keyExtractor={(item) => item.idEvent.toString()}
            renderItem={({ item }) =>
              <View style={styles.container}>
                <View style={{ flex: 1 }}>
                  <View style={styles.header}>
                    <View style={{ flex: 2 }}>
                      <Text style={styles.textTitle}>Evenement : {item.nomEvent}</Text>
                    </View>
                  </View>
                </View>
                <TouchableOpacity onPress={() => this.props.navigation.navigate("EventDetails", {event: item})}>
                  <View style={{ margin: 3, marginLeft: 5, marginTop: 0 }}>
                    <Text style={{ color: '#FFFFFF' }}>Hôte : {item.hote}</Text>
                  </View>
                  <View style={{ margin: 3, marginLeft: 5 }}>
                    <Text style={{ color: '#FFFFFF' }}>Adresse : {item.adresse}</Text>
                  </View>
                  <View style={{ margin: 3, marginLeft: 5 }}>
                    <Text style={{ color: '#FFFFFF' }}>Date : {this.traductionDate(item.dateEvent)}</Text>
                  </View>
                  <View style={{ margin: 3, marginLeft: 5 }}>
                    <Text style={{ color: '#FFFFFF' }}>Heure : {item.heure}</Text>
                  </View>
                  
                </TouchableOpacity>

              </View>

            }
          />
        </ScrollView>
      </SafeAreaView>
    )
  }
}

const styles = StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  },
  titrePage: {
    color: '#FFFFFF',
    fontSize: 18,
    textAlign: 'center'
  },
  container: {
    height: 140,
    padding: 12,
    paddingBottom: 3,
    flex: 1,
    backgroundColor: '#3A4750',
    margin: 8,
    marginBottom: 0
  },
  header: {
    flexDirection: 'row',
    flex: 1
  },
  textTitle: {
    color: '#FFFFFF',
    fontSize: 22,
    margin: 5,
    marginTop: 2,
    marginBottom: 0
  }
})
export default EventFutur