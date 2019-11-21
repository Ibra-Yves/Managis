import React, { Component } from 'react'

import { Text, StyleSheet, View, TouchableOpacity, FlatList } from 'react-native'



 class EventDetails extends Component {
  render() {
  	console.log(this.props)
    const event = this.props.navigation.state.params.event
    return (
      <View >
      	<View style={styles.containerTitre}>
        	<Text style={styles.titre}>{event.title}</Text>
        </View>
        <View style={styles.containerTitreDate}>
        	<Text style={styles.titre2}>Date de l'événement: </Text>
        </View>
        	<Text style={styles.text}>{event.date}</Text>
        
        <View style={styles.containerTitre2}>
        	<Text style={styles.titre2}>Heure de l'événement: </Text>
        </View>
        <View>
       		<Text style={styles.text}>{event.heure}</Text>
       	</View>
        <View style={styles.containerTitre2}>
        	<Text style={styles.titre2}>Lieu de l'événement: </Text>
        </View>
        <Text style={styles.text}>{event.lieu}</Text>
        <View style={{flexDirection: 'row', flex: 1}}>
        	<TouchableOpacity 
        		style={styles.choix}
        		onPress={() => console.log("display la liste des invités")}>
        		<Text style={{color: '#FFFFFF', fontSize: 16}}>Invités</Text>
        	</TouchableOpacity>
        	<TouchableOpacity style={styles.choix}>
        		<Text style={{color: '#FFFFFF', fontSize: 16}}>Fournitures</Text>
        	</TouchableOpacity>
        	<TouchableOpacity style={styles.choix}>
        		<Text style={{color: '#FFFFFF', fontSize: 16}}>Commentaires</Text>
        	</TouchableOpacity>
        </View>
        <View>
        	<FlatList
        		data={this.props.navigation.state.params.event.invites}
        		key
        		renderItem={({item}) => <Text>{item}</Text>}
        	/>
        </View>
      </View>

    )
  }
}

const styles = StyleSheet.create({
	titre: {
		color: '#FFFFFF',
		fontSize: 50,
		textAlign: 'center'
	},
	containerTitre: {
    	backgroundColor:'#3A4750',
    	//height: 60,
    	//flex: 1
  	},
  	titre2: {
		color: '#FFFFFF',
		fontSize: 25,
		textAlign: 'center'
	},
	containerTitre2: {
		flex: 1,
		justifyContent: 'center',
		alignItems: 'center',
    	backgroundColor:'#3A4750',
    	marginLeft: 8,
    	marginRight: 8,
    	borderRadius: 25
    	//flex: 1
  	},
  	containerTitreDate: {
  		flex: 1,
  		justifyContent: 'center',
  		alignItems: 'center',
    	backgroundColor:'#3A4750',
    	//height: 45,
    	margin : 8,
    	marginBottom: 0,
    	borderRadius: 25,
    	//flex: 1
  	},
  	text:{
  		color: '#3A4750',
		fontSize: 18,
		textAlign: 'center',
		paddingBottom: 10,
		paddingTop: 10,
		justifyContent: 'center',
		//display: 'none'
  	},
  	choix: {
  		flex: 1,
  		borderRadius :25,
  		backgroundColor: '#3A4750',
  		alignItems: 'center',
  		padding: 5,
  		margin : 4

  	}
})
export default EventDetails