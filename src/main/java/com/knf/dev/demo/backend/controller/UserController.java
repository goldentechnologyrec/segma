package com.knf.dev.demo.backend.controller;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.knf.dev.demo.backend.entity.User;
import com.knf.dev.demo.backend.exception.InternalServerError;
import com.knf.dev.demo.backend.exception.UserNotFound;
import com.knf.dev.demo.backend.repository.UserRepository;

@RestController
@RequestMapping("/users")
@CrossOrigin(origins = "http://localhost:8080")
public class UserController {

    @Autowired
    UserRepository userRepository;

    // Create user
    @PostMapping
    public ResponseEntity<User> createUser(@RequestBody User user) {
        try {
            User NewUser = new User(
                    user.getFirstName(),
                    user.getLastName(),
                    user.getEmail(),
                    user.getAge(),
                    user.getGroupes());
            userRepository.save(NewUser);
            return new ResponseEntity<>(NewUser, HttpStatus.CREATED);
        } catch (Exception e) {
            throw new InternalServerError(e.getMessage());
        }
    }

    // Update user
    @PutMapping("/{id}")
    public ResponseEntity<User> updateUser(
            @PathVariable("id") Long id,
            @RequestBody User user) {
        Optional<User> userdata = userRepository.findById(id);
        if (userdata.isPresent()) {
            User _user = userdata.get();
            _user.setEmail(user.getEmail());
            _user.setFirstName(user.getFirstName());
            _user.setLastName(user.getLastName());
            _user.setAge(user.getAge());
            _user.setGroupes(user.getGroupes());
            return new ResponseEntity<>(userRepository.save(_user), HttpStatus.OK);
        } else {
            throw new UserNotFound("Invalid User Id");
        }
    }

    // Get all Users
    @GetMapping
    public ResponseEntity<List<User>> getAllUsers() {

        try {
            List<User> users = new ArrayList<User>();
            userRepository.findAll().forEach(users::add);
            return new ResponseEntity<>(users, HttpStatus.OK);
        } catch (Exception e) {
            throw new InternalServerError(e.getMessage());
        }

    }

    // Get user by ID
    @GetMapping("/{id}")
    public ResponseEntity<User> getUserByID(@PathVariable("id") Long id) {

        Optional<User> userdata = userRepository.findById(id);
        if (userdata.isPresent()) {
            return new ResponseEntity<>(userdata.get(), HttpStatus.OK);
        } else {
            throw new UserNotFound("Invalid User Id");
        }

    }

    // Delete user
    @DeleteMapping("/{id}")
    public ResponseEntity<User> deleteUser(@PathVariable("id") Long id) {

        Optional<User> userdata = userRepository.findById(id);
        if (userdata.isPresent()) {
            userRepository.deleteById(id);
            return new ResponseEntity<>(HttpStatus.NO_CONTENT);
        } else {
            throw new UserNotFound("Invalid User Id");
        }
    }
}
