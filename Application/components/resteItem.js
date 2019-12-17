import React, { Component } from 'react'

import { Text, TouchableOpacity, View, StyleSheet, ScrollView, Image, SafeAreaView } from 'react-native'

export default class ResteItem extends Component {
    reste = this.props.navigation.state.params.reste
    render() {
        return (
            <SafeAreaView style={{ flex: 1 }}>
                <ScrollView>
                    <View style={styles.containerTitre}>
                        <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
                            <TouchableOpacity
                                onPress={() => this.props.navigation.goBack()}>
                                <Image
                                    style={styles.icon}
                                    source={require('../image/icons8-gauche-50.png')}
                                />
                            </TouchableOpacity>

                        </View>
                        <View style={{ flex: 6, justifyContent: 'center' }}>
                            <Text style={styles.titrePage}>Détails de l'annonce</Text>
                        </View>
                        <View style={{ flex: 1 }}>

                        </View>
                    </View>
                    <View style={{ alignItems: 'center' }}>

                        <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                            <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Nom de l'annonce</Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text style={styles.inputBox}> {this.reste.nomReste} </Text>
                        </View>
                        <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                            <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Quantité</Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text style={styles.inputBox}>{this.reste.quantiteReste}</Text>
                        </View>
                        <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                            <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Description</Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text style={styles.inputBox}> {this.reste.description} </Text>
                        </View>
                        <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                            <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Adresse</Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text style={styles.inputBox}> {this.reste.adresse} </Text>
                        </View>
                        <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                            <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Adresse email de l'annonceur</Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text style={styles.inputBox}> {this.reste.email} </Text>
                        </View>
                    </View>
                </ScrollView>
            </SafeAreaView>
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
        justifyContent: 'flex-end',
        borderColor: "#000000",
        borderRadius: 50,
        backgroundColor: '#3A4750',
        width: 350

    },
    titrePage: {
        color: '#FFFFFF',
        fontSize: 18,
        textAlign: 'center'
    },
    containerTitre: {
        backgroundColor: '#3A4750',
        flexDirection: 'row',
        height: 60
    },
    icon: {
        height: 30,
        width: 30
    },

})
