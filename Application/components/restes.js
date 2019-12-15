import React, { Component } from 'react';

import {
  Image,
  ScrollView,
  TouchableOpacity,
  StyleSheet,
  ActivityIndicator,
  Text,
  View,
  RefreshControl,
  AsyncStorage,
  FlatList,
  SafeAreaView,
  TextInput
} from 'react-native';



class Restes extends Component {

  constructor(props) {
    super(props)
    this.state = {
      UserId: [],
      searchData: [],
      refreshing: true,
      data: [],
      arrayholder: []
    }
  }



  //On récupère l'id de l'utilisateur connecté pour ne pas afficher ses annonces car il s'en fou de les voir.
  componentWillMount() {
    this._loadInitialState().done();
  }

  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserId');
    if (value !== null) {
      this.setState({ UserId: value });
    }
    this.recuperationDonneeAnnonce()
  }




  //on récupère les données sous forme de tableau qui sont envoyées par le fichier "restes.php" et on les met dans la variable data pour pouvoir les traiter.
  recuperationDonneeAnnonce = () => {

    fetch('https://managis.be/GestionApp/restes.php', {
    //fetch('http://localhost:8878/ManagisApp/ManagisApp/DBRestes/restes.php', {
      method: 'POST',
      header: {
        'Accept': 'application/json',
        'Content-type': 'application/json'
      },
      body: JSON.stringify({
        userId: this.state.UserId,
      })

    })
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({ refreshing: false });
        this.setState({ data: responseJson });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  

  onRefresh() {
    //Clear old data of the list
    this.setState({ data: [] });
    //Call the Service to get the latest data
    this.recuperationDonneeAnnonce();
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
          <View style={styles.containerTitre}>
            <View style={{ flex: 1 }}>
            </View>
            <View style={{ flex: 6, justifyContent: 'center' }}>
              <Text style={styles.titrePage}>Liste des restes</Text>
            </View>
            <View style={{ flex: 1 }}>
              <TouchableOpacity
                onPress={() => this.props.navigation.openDrawer('myNav')}
                style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
                <Image
                  source={require('../image/icons8-menu-arrondi-50.png')}
                  style={styles.icon}
                />
              </TouchableOpacity>
            </View>
          </View>
          
          <View>
            <FlatList
              data={this.state.data}
              keyExtractor={(item) => item.idUser.toString()}
              renderItem={({ item }) =>
                <View style={styles.container}>
                  <TouchableOpacity
                    onPress={() => this.props.navigation.navigate("ResteItem", { reste: item })}
                    style={styles.event}>
                    <View style={{ flex: 1 }}>
                      <View style={styles.header}>
                        <View style={{ flex: 2 }}>
                          <Text style={styles.textTitle}>{item.nomReste}</Text>
                        </View>
                        <View style={{ flex: 1 }}>
                          <Text style={styles.textDate}>Quantité : {item.quantiteReste}</Text>
                        </View>
                      </View>
                      <View style={styles.footer}>
                        <Text style={styles.textPlace}>Adresse : {item.adresse}</Text>
                      </View>
                    </View>
                  </TouchableOpacity>
                </View>}
            />
          </View>
        </ScrollView >
      </SafeAreaView>
    );
  }
}

const styles = StyleSheet.create({

  MainContainer: {

    justifyContent: 'center',
    flex: 1,
    margin: 10

  },

  titrePage: {
    color: '#FFFFFF',
    fontSize: 18,
    textAlign: 'center'
  },
  annonce: {
    alignItems: 'center',
    fontSize: 16,

  },
  textViewContainer: {
    textAlignVertical: 'center',
    padding: 10,
    fontSize: 15,
    fontWeight: 'bold'
  },

  icon: {
    width: 30,
    height: 30
  },

  iconSearch: {
    width: 20,
    height: 20,
    margin: 2
  },

  textinput: {
    width: 400,
    backgroundColor: '#3A4750',
    borderRadius: 15,
    paddingVertical: 12,
    fontSize: 16,
    color: '#FFFFFF',
    textAlign: 'center'
  },

  containerTitre: {
    backgroundColor: '#3A4750',
    flexDirection: 'row',
    height: 60
  },

  rowViewContainer: {
    fontSize: 20,
    paddingRight: 10,
    paddingTop: 10,
    paddingBottom: 10,
  },

  searchText: {
    alignItems: 'center',
    fontSize: 16,
    color: '#3A4750'
  },
  TouchableOpacityStyle: {
    position: 'absolute',
    width: 50,
    height: 50,
    alignItems: 'center',
    justifyContent: 'center',
    right: 30,
    bottom: 30
  },
  FloatingButtonStyle: {
    width: 100,
    height: 100,
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

  },
  inputBox: {
    width: 300,
    borderRadius: 25,
    borderWidth: 2,
    borderColor: '#3A4750',
    paddingVertical: 12,
    fontSize: 16,
    color: '#FFFFFF',
    textAlign: 'center',
    marginVertical: 10,
    color: '#3A4750'
  }

});

export default Restes