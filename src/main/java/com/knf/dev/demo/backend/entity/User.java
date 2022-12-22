package com.knf.dev.demo.backend.entity;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "authors")
public class User {
    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE)
    private Long id;

    @Column(name = "first_name", nullable = false)
    private String firstName;

    @Column(name = "last_name", nullable = false, length = 50)
    private String lastName;

    @Column(name = "email", nullable = false, length = 100)
    private String UserEmail;

    @Column(name = "age", nullable = false)
    private int UserAge;

    @Column(name = "groupes", nullable = false, length = 10)
    private String UserGroups;

    public User() {
        super();
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getEmail() {
        return UserEmail;
    }

    public void setEmail(String UserEmail) {
        this.UserEmail = UserEmail;
    }
    // UserAge
    public int getAge() {
        return UserAge;
    }

    public void setAge(int UserAge) {
        this.UserAge = UserAge;
    }

    public String getGroupes() {
        return UserGroups;
    }

    public void setGroupes(String UserGroups) {
        this.UserGroups = UserGroups;
    }

    public User(String firstName, String lastName, 
            String UserEmail, int UserAge, String UserGroups) {
        super();
        this.firstName = firstName;
        this.lastName = lastName;
        this.UserEmail = UserEmail;
        this.UserAge = UserAge;
        this.UserGroups = UserGroups;
    }
}
