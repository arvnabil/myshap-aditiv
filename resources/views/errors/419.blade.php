@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('detail', "This signifies that the server has returned an error due to a Cross-Site Request Forgery (CSRF) validation failure.")
@section('image_url', "https://plus.unsplash.com/premium_photo-1661964030420-15481be20d5f?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")
