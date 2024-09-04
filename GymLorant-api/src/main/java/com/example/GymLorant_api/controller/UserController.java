package com.example.GymLorant_api.controller;


import com.example.GymLorant_api.exception.ResourceNotFoundException;
import com.example.GymLorant_api.model.User;
import com.example.GymLorant_api.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

@RestController
@RequestMapping("/api/v1")
public class UserController {

    @Autowired
    private UserRepository userRepository;


    @GetMapping("/user")
    public List<User> listarUsers(){
        return userRepository.findAll();
    }

    @PostMapping("/user")
    public User guardarUser(@RequestBody User user){
        return userRepository.save(user);
    }

    @GetMapping("/user/{id}")
    public ResponseEntity<User> listaruserPorID(@PathVariable Long id){
        User user =  userRepository.findById(id)
                .orElseThrow(() -> new ResourceNotFoundException("El user con el id "+ id + " no existe"));
        return ResponseEntity.ok(user);
    }

    @PutMapping("/user/{id}")
    public ResponseEntity<User> actualizarUser(@PathVariable Long id, @RequestBody User userRequest){
        User user= userRepository.findById(id)
                .orElseThrow(()-> new ResourceNotFoundException("El user con el ID "+ id + "No existe"));

        user.setNombre(userRequest.getNombre());
        user.setEmail(userRequest.getEmail());

         User userActualizado= userRepository.save(user);
         return ResponseEntity.ok(userActualizado);
    }

    public ResponseEntity<Map<String,Boolean>> eliminarUser(@PathVariable Long id){
        User user= userRepository.findById(id)
                .orElseThrow(()-> new ResourceNotFoundException("El user con el ID "+ id + "No existe"));

        userRepository.delete(user);
        Map<String, Boolean> response= new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return ResponseEntity.ok(response);
    }
}
