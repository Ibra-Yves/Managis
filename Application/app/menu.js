import React, { Component } from 'react';
import {
	AppRegistry,
	View,
	Text,
	StyleSheet,
	TouchableOpacity,
	Image,
	ScrollView,
	SafeAreaView
} from 'react-native';

export default class menu extends Component {

	render() {
		const { navigate } = this.props.navigation;
		return (
			<SafeAreaView style={{ flex: 1 }}>
				<ScrollView>
					<View style={styles.container}>
						<Image
							source={require('../image/logo_transparent.png')}
							style={styles.logo} />
						<TouchableOpacity
							onPress={() => navigate('Profile')}
							style={styles.btn2}>
							<Text style={styles.btnText}>Profil</Text>
						</TouchableOpacity>
						<TouchableOpacity
							onPress={() => navigate('Restes')}
							style={styles.btn2}>
							<Text style={styles.btnText}>Marché des Restes</Text>
						</TouchableOpacity>
					</View>
				</ScrollView>
			</SafeAreaView>
		);
	}
}
const styles = StyleSheet.create({
	container: {
		display: 'flex',
		alignItems: 'center',
		justifyContent: 'center'
	},
	logo: {
		width: 400,
		height: 350
	},
	btn2: {
		backgroundColor: '#3A4750',
		padding: 10,
		margin: 15,
		width: '80%',
		alignItems: 'center',
		justifyContent: 'center',
		borderRadius: 10
	},
	btnText: {
		color: 'white',
		fontWeight: 'bold',
		fontSize: 20,
		alignItems: 'center',
		justifyContent: 'center'
	},

});


AppRegistry.registerComponent('menu', () => menu);
