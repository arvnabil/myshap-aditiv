@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('detail', "Access to the requested resource is forbidden. The server understood the request, but will not fulfill it, if it was correct.")
@section('image_url', "https://plus.unsplash.com/premium_photo-1661904463156-50f7253a0afe?q=80&w=2097&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")
