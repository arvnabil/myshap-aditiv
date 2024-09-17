@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('detail', "The request lacks valid authentication credentials for the requested resource.")
@section('image_url', "https://plus.unsplash.com/premium_photo-1677156471548-067bde00aacd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")
