import React, { Component } from 'react'

import { Text, TextInput, TouchableOpacity, View, StyleSheet, AsyncStorage } from 'react-native'

export default class ResteItemPerso extends Component {
    reste = this.props.navigation.state.params.reste


    constructor(props) {
        super(props)
        this.state = {
            UserId: [],
            userNomReste: this.reste.nomReste,
            userQuantiteReste: this.reste.quantiteReste,
            userDescriptionReste: this.reste.description,
            userAdresse: this.reste.adresse
        }
    }

    componentDidMount() {
        this._loadInitialState().done();
    }

    _loadInitialState = async () => {
        var value = await AsyncStorage.getItem('UserId');
        if (value !== null) {
            this.setState({ UserId: value });
        }
    }

    userModifAnnonce = () => {
        const { userNomReste } = this.state;
        const { userQuantiteReste } = this.state;
        const { userDescriptionReste } = this.state;
        const { userAdresse } = this.state;

        if (userNomReste == "") {

            this.setState({ userNomReste: 'Entrez le nom de votre reste ' })

        }
        else {

            fetch('http://192.168.1.10:8878/ManagisApp/ManagisApp/DBRestes/modifAnnonce.php', {
                method: 'POST',
                header: {
                    'Accept': 'application/json',
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    userId: this.state.UserId,
                    nomReste: userNomReste,
                    quantiteReste: userQuantiteReste,
                    descriptionReste: userDescriptionReste,
                    adresse: userAdresse,
                    idReste: this.reste.idReste
                })

            })
                .then((response) => response.json())
                .then((responseJson) => {
                    alert(responseJson);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }

    userDeleteAnnonce = () => {
        const { userNomReste } = this.state;
        const { userQuantiteReste } = this.state;
        const { userDescriptionReste } = this.state;
        const { userAdresse } = this.state;

        if (userNomReste == "") {

            this.setState({ userNomReste: 'Entrez le nom de votre reste ' })

        }
        else {

            fetch('http://192.168.1.10:8878/ManagisApp/ManagisApp/DBRestes/deleteAnnonce.php', {
                method: 'POST',
                header: {
                    'Accept': 'application/json',
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    idReste: this.reste.idReste
                })

            })
                .then((response) => response.json())
                .then((responseJson) => {
                    alert(responseJson);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }

    render() {
        return (
            <View>
                <View style={{alignItems: 'center', justifyContent: 'center', backgroundColor: '#3A4750'}}>
                    <Text style={{color: '#FFFFF', fontSize: 20}}>Détails de l'annonce</Text>
                </View>
                <View style={{alignItems: 'center', justifyContent: 'center'}}>
                    <Text style={{color: '#3A4750', marginTop: 10}}>Nom de votre annonce</Text>
                </View>
                <View style={styles.inputContainer}>
                    <TextInput
                        style={styles.inputBox}
                        placeholder={this.reste.nomReste}
                        placeholderTextColor='#000000'
                        onChangeText={userNomReste => this.setState({ userNomReste })}
                    />
                </View>
                <View style={{alignItems: 'center', justifyContent: 'center'}}>
                    <Text style={{color: '#3A4750', marginTop: 10, marginBottom: 8}}>Quantité</Text>
                </View>
                <View style={styles.inputContainer}>
                    <TextInput
                        style={styles.inputBox}
                        placeholder={this.reste.quantiteReste}
                        placeholderTextColor='#000000'
                        onChangeText={userQuantiteReste => this.setState({ userQuantiteReste })}
                    />
                </View>
                <View style={{alignItems: 'center', justifyContent: 'center'}}>
                    <Text style={{color: '#3A4750', marginTop: 10, marginBottom: 8}}>Description</Text>
                </View>
                <View style={styles.inputContainer}>
                    <TextInput
                        style={styles.inputBox}
                        placeholder={this.reste.description}
                        placeholderTextColor='#000000'
                        onChangeText={userDescriptionReste => this.setState({ userDescriptionReste })}
                    />
                </View>
                <View style={{alignItems: 'center', justifyContent: 'center'}}>
                    <Text style={{color: '#3A4750', marginTop: 10, marginBottom: 8}}>Adresse</Text>
                </View>
                <View style={styles.inputContainer}>
                    <TextInput
                        style={styles.inputBox}
                        placeholder={this.reste.adresse}
                        placeholderTextColor='#000000'
                        onChangeText={userAdresse => this.setState({ userAdresse })}
                    />
                </View>
                <View style={styles.submitContainer}>
                    <TouchableOpacity
                        onPress={this.userModifAnnonce}
                        style={styles.submitButton}>
                        <Text style={{ color: 'white', textAlign: 'center' }}>Modifier</Text>
                    </TouchableOpacity>
                </View>
                <View style={styles.submitContainer}>
                    <TouchableOpacity
                        onPress={this.userDeleteAnnonce}
                        style={styles.submitButton}>
                        <Text style={{ color: 'white', textAlign: 'center' }}>Supprimer</Text>
                    </TouchableOpacity>
                </View>
            </View>

        )
    }
}

const styles = StyleSheet.create({
    inputBox: {
        width: 300,
        backgroundColor: '#3A4750',
        borderRadius: 25,
        paddingVertical: 12,
        fontSize: 16,
        color: '#FFFFFF',
        textAlign: 'center',
        marginVertical: 10
    },
    submitButton: {
        backgroundColor: '#3A4750',
        width: 100,
        borderRadius: 25,
        marginVertical: 10,
        paddingVertical: 13,
        textAlign: 'center',
        color: '#FFFFFF'
    },
    submitContainer: {
        alignItems: 'center',
        justifyContent: 'flex-end'
    },
    inputContainer: {
        alignItems: 'center',
        justifyContent: 'flex-end'
    }

})
